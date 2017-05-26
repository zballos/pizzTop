<?php
use controller\ClienteController;
use model\Cliente;
use data\Debug;

$cliente = new Cliente();
$data = $cliente->setAllFromPost($_POST);

Debug::show($_POST);

if (empty($data->getId())) {
    $ctrl = new ClienteController();
    if ($ctrl->inserir($data)) {
        //header("location: index.php");
    }
} else {
    $ctrl = new ClienteController();
    if ($ctrl->atualizar($data)) {
        //header("location: index.php");
    }
}
