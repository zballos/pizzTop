<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/pizz/' . "controller/ClienteController.php";

$id = $_GET['id'];
$ctrl = new ClienteController();
if($ctrl->deletar($id)){
    header("location: index.php");
}
?>
