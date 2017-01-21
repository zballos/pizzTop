<?php

/**
 * Class Endereco
 */
class Endereco
{
    private $id;
    private $rua;
    private $numero;
    private $bairro;
    private $cidade;
    private $latitude;
    private $longitude;
    private $cliente_id;

    public function __construct(){}

    // gets and setters
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getRua(){
        return $this->rua;
    }
    public function setRua($rua){
        $this->rua = $rua;
    }

    public function getNumero(){
        return $this->numero;
    }
    public function setNumero($numero){
        $this->numero = $numero;
    }
    
    public function getBairro(){
        return $this->bairro;
    }
    public function setBairro($bairro){
        $this->bairro = $bairro;
    }

    public function getCidade(){
        return $this->cidade;
    }
    public function setCidade($cidade){
        $this->cidade = $cidade;
    }

    public function getLatitude(){
        return $this->latitude;
    }
    public function setLatitude($latitude){
        $this->latitude = $latitude;
    }

    public function getLongitude(){
        return $this->longitude;
    }
    public function setLongitude($longitude){
        $this->longitude = $longitude;
    }
    
    public function getClienteId(){
        return $this->cliente_id;
    }
    public function setClienteId($cliente_id){
        $this->cliente_id = $cliente_id;
    }
}
