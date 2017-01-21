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

    /**
     *
     */
    public function __construct()
    {
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
    
    public function setAllFromPost($post)
    {
        $end = new Endereco();
        $this->setNome($post['nome']);
        $this->setTelefone($post['tel']);
        if (!empty($post['id']) && !empty($post['end_id'])) {
            $this->setId($post['id']);
            $end->setId($post['end_id']);
            $end->setClienteId($post['id']);
        }
        $end->setRua($post['rua']);
        $end->setNumero($post['num']);
        $end->setBairro($post['bairro']);
        $end->setCidade($post['cidade']);
        $end->setLatitude($post['latitude']);
        $end->setLongitude($post['longitude']);
        $this->setEndereco($end);
        
    }
}
