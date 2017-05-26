<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/pizz/' . "controller/ClienteController.class.php";
    $clientes = new ClienteController();
    $id = $_GET['id'];
    $dados = $clientes->busca($id);
?>

<form method="POST" action="salvar_cliente.php">
<div class="panel panel-default">
  <div class="panel-heading"><h3>Editar Dados do Cliente</h3></div>
    <div class="panel-body">
    <div class="form-group row">
        <div class=" col-sm-7 require">
            <label for="nome">Nome</label>
            <input type="text" class="form-control require" required id="nome" name="nome" value="<?=$dados[0]->nome;?>">
        </div>
        <div class="col-sm-5">
            <label for="tel">Telefone</label>
            <input type="text" class="form-control tel" name="tel" id="tel" maxlength="15" value="<?=$dados[0]->telefone;?>" required>
        </div>
        
    </div>
    <div class="form-group row">
        <div class="col-sm-5">
            <label for="rua">Rua</label>
            <input type="text" id="rua" class="form-control" name="rua" value="<?=$dados[0]->rua;?>" required>
        </div>
        <div class="col-sm-1">
            <label for="num">Número</label>
            <input type="text" class="form-control num" name="num" id="num" value="<?=$dados[0]->numero;?>" required>
        </div>
        <div class="col-sm-3">
            <label for="bairro">Bairro</label>
            <input type="text" class="form-control" id="bairro" name="bairro" value="<?=$dados[0]->bairro;?>" required>
        </div>
        <div class="col-sm-3">
            <label for="cidade">cidade</label>
            <input type="text" class="form-control" id="cidade" name="cidade" value="<?=$dados[0]->cidade;?>" required>
        </div>
    </div>        
    <input type="hidden" id="latitude" name="latitude" value="<?=$dados[0]->latitude;?>">
    <input type="hidden" id="longitude" name="longitude" value="<?=$dados[0]->longitude;?>">
    <input type="hidden" id="id" name="id" value="<?=$dados[0]->id;?>">
    <input type="hidden" id="end_id" name="end_id" value="<?=$dados[0]->id_end;?>">
    <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</div>
</form>
<script src="js/form.js"></script>
<script src="js/jquery.mask.js"></script>
