<?php

require_once "Endereco.php";

/**
 * Class Cliente
 */
class Cliente
{
    private $id;
    private $nome;
    private $telefone;
    private $endereco;

    public function __construct()
    {
        //
    }

    // gets and setters
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEndereco(Endereco $endereco)
    {
        $this->endereco = $endereco;
    }

    /**
     * Format fields to save
     *
     * @param $post
     * @return Cliente $cliente
     */
    public function setAllFromPost($post)
    {
        $cliente = new Cliente;
        $endereco = new Endereco();

        $cliente->setNome($post['nome']);
        $cliente->setTelefone($post['tel']);
        if (!empty($post['id']) && !empty($post['end_id'])) {
            $cliente->setId($post['id']);
            $endereco->setId($post['end_id']);
            $endereco->setClienteId($post['id']);
        }
        $endereco->setRua($post['rua']);
        $endereco->setNumero($post['num']);
        $endereco->setBairro($post['bairro']);
        $endereco->setCidade($post['cidade']);
        $endereco->setLatitude($post['latitude']);
        $endereco->setLongitude($post['longitude']);
        $cliente->setEndereco($endereco);

        return $cliente;
    }
}
