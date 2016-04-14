<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/pizz/' . "controller/ClienteController.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . '/pizz/' . "model/Cliente.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . '/pizz/' . "model/Endereco.php";

    $cliente = new Cliente();
    $end = new Endereco();
    $cliente->setNome($_POST['nome']);
    $cliente->setTelefone($_POST['tel']);
    if(!empty($_POST['id']) && !empty($_POST['end_id'])){
        $cliente->setId($_POST['id']);
        $end->setId($_POST['end_id']);
        $end->setClienteId($_POST['id']);
    }
    $end->setRua($_POST['rua']);
    $end->setNumero($_POST['num']);
    $end->setBairro($_POST['bairro']);
    $end->setCidade($_POST['cidade']);
    $end->setLatitude($_POST['latitude']);
    $end->setLongitude($_POST['longitude']);
    $cliente->setEndereco($end);

    
    if(empty($cliente->getId())){
        $ctrl = new ClienteController();
        if($ctrl->Inserir($cliente)){
            header("location: index.php");
        }
    }else{
        $ctrl = new ClienteController();
        if($ctrl->Atualizar($cliente)){
            header("location: index.php");
        }
    }

?>
