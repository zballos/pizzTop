<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/pizz/' . "controller/ClienteController.php";

$cliente = new Cliente();

$data = $cliente->setAllFromPost($_POST);

if (empty($data->getId())) {
    $ctrl = new ClienteController();
    if ($ctrl->Inserir($data)) {
        header("location: index.php");
    }
} else {
    $ctrl = new ClienteController();
    if ($ctrl->Atualizar($data)) {
        header("location: index.php");
    }
}
