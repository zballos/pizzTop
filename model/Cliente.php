<?php
require_once "Endereco.php";

class Cliente
{
    private $id;
    private $nome;
    private $telefone;
    private $endereco;

    public function __construct(){}

    /*public function Cliente($nome, $telefone){
        $this->nome = $nome;
        $this->telefone = $telefone;
    }*/

    // gets and setters
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getTelefone(){
        return $this->telefone;
    }
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function getEndereco(){
        return $this->endereco;
    }
    public function setEndereco(Endereco $endereco){
        $this->endereco = $endereco;
    }
}
?>

