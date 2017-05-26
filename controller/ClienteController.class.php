<?php
namespace controller;

use data\DatabaseConnection;
use model\Cliente;

/**
 * Class ClienteController
 * @property Cliente $cliente
 */
class ClienteController
{
    private $bd;

    /**
     *
     */
    public function __construct()
    {
        $this->bd = new DatabaseConnection();
    }

    /**
     * @param Cliente $cliente
     * @return bool|string
     */
    public function inserir(Cliente $cliente)
    {
        try {
            $sqlClient = 'INSERT INTO clientes (id, nome, telefone) VALUES (null, :nome , :telefone)';
            $paramsClient = [
                ':nome' => $cliente->getNome(),
                ':telefone' => $cliente->getTelefone()
            ];
            var_dump($paramsClient);
            $id_cliente = $this->bd->inserir($sqlClient, $paramsClient);

            $sqlEnd = "INSERT INTO enderecos 
                (id, rua, bairro, numero, cidade, latitude, longitude, cliente_id) 
                VALUES ('', :rua, :bairro, :numero, :cidade, :latitude, :longitude, :cliente_id)";
            $paramsEnd = [
                ':rua' => $cliente->getEndereco()->getRua(),
                ':bairro' => $cliente->getEndereco()->getBairro(),
                ':cidade' => $cliente->getEndereco()->getCidade(),
                ':latitude' => $cliente->getEndereco()->getLatitude(),
                ':longitude' => $cliente->getEndereco()->getLongitude(),
                ':cliente_id' => $id_cliente,
            ];
            $this->bd->inserir($sqlEnd, $paramsEnd);
            return true;
        } catch (Exception $e) {
            var_dump($e->getMessage());

            return $e->getMessage();
        }
    }

    /**
     * @param Cliente $cliente
     * @return bool|string
     */
    public function atualizar(Cliente $cliente)
    {
        try {
            $sqlCli = "UPDATE clientes SET clientes.nome='{$cliente->getNome()}', clientes.telefone='{$cliente->getTelefone()}' WHERE clientes.id = '{$cliente->getId()}'";
            $this->bd->atualizar($sqlCli);
            $sqlEnd = "UPDATE enderecos SET 
                enderecos.rua = '{$cliente->getEndereco()->getRua()}', 
                enderecos.bairro = '{$cliente->getEndereco()->getBairro()}', 
                enderecos.numero = '{$cliente->getEndereco()->getNumero()}', 
                enderecos.cidade = '{$cliente->getEndereco()->getCidade()}', 
                enderecos.latitude = '{$cliente->getEndereco()->getLatitude()}', 
                enderecos.longitude = '{$cliente->getEndereco()->getLongitude()}', 
                enderecos.cliente_id = {$cliente->getEndereco()->getClienteId()}
                WHERE enderecos.id = {$cliente->getEndereco()->getId()}";
            $this->bd->atualizar($sqlEnd);
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function listarTodos()
    {
        $cliente = $this->bd->listar("
            SELECT clientes.id, clientes.nome, clientes.telefone, 
            enderecos.id as id_end, enderecos.rua, enderecos.bairro, 
            enderecos.numero, enderecos.cidade, enderecos.latitude, 
            enderecos.longitude, enderecos.cliente_id 
            FROM clientes, enderecos 
            WHERE clientes.id = enderecos.cliente_id  
            ORDER BY clientes.id DESC 
            LIMIT 10");
        return $cliente;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function busca($id)
    {
        $cliente = $this->bd->listar("
            SELECT clientes.id, clientes.nome, clientes.telefone, 
            enderecos.id as id_end, enderecos.rua, enderecos.bairro, 
            enderecos.numero, enderecos.cidade, enderecos.latitude, 
            enderecos.longitude, enderecos.cliente_id 
            FROM clientes, enderecos 
            WHERE clientes.id = enderecos.cliente_id AND 
            clientes.id = $id 
            ORDER BY clientes.id DESC 
            LIMIT 10");
        return $cliente;
    }

    /**
     * @param $tel
     * @return mixed
     */
    public function buscaTel($tel)
    {
        $cliente = $this->bd->listar("
            SELECT clientes.id, clientes.nome, clientes.telefone, 
            enderecos.id as id_end, enderecos.rua, enderecos.bairro, 
            enderecos.numero, enderecos.cidade, enderecos.latitude, 
            enderecos.longitude, enderecos.cliente_id 
            FROM clientes, enderecos 
            WHERE clientes.id = enderecos.cliente_id AND 
            clientes.telefone LIKE '$tel' 
            ORDER BY clientes.id DESC 
            LIMIT 10");
        return $cliente;
    }

    /**
     * @param $id
     * @return bool|string
     */
    public function deletar($id)
    {
        try {
            $sql1 = "DELETE FROM enderecos WHERE cliente_id = $id";
            $sql2 = "DELETE FROM clientes WHERE id = $id";
            $this->bd->deletar($sql1);
            $this->bd->deletar($sql2);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
