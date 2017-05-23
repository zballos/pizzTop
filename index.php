<?php
/**
 * Created by PhpStorm.
 * User: zballos
 * Date: 23/05/17
 * Time: 02:30
 */
//use model\Cliente;

function __autoload($class)
{
    include_once "{$class}.php";
}

/*$cliente = new Cliente();

$cliente->setNome("Edson Zeballos");

print_r($cliente->getNome());*/