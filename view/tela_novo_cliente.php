<?php
/**
 * @author Edson
 */
?>
<form method="POST" action="salvar_cliente.php" id="form">
<div class="panel panel-default">
  <div class="panel-heading"><h3>Novo Cliente</h3></div>
    <div class="panel-body">
    <div class="form-group row">
        <div class=" col-sm-7 require">
            <label for="nome">Nome</label>
            <input type="text" class="form-control require" required id="nome" name="nome" placeholder="Entre com nome">
        </div>
        <div class="col-sm-5">
            <label for="tel">Telefone</label>
            <input type="text" class="form-control tel" name="tel" id="tel" maxlength="15" required>
        </div>
        
    </div>
    <div class="form-group row">
        <div class="col-sm-5">
            <label for="rua">Rua</label>
            <input type="text" id="rua" class="form-control" name="rua" required>
        </div>
        <div class="col-sm-1">
            <label for="num">Número</label>
            <input type="text" class="form-control num" name="num" id="num" required>
        </div>
        <div class="col-sm-3">
            <label for="bairro">Bairro</label>
            <input type="text" class="form-control" id="bairro" name="bairro" required>
        </div>
        <div class="col-sm-3">
            <label for="cidade">Cidade</label>
            <input type="text" class="form-control" id="cidade" name="cidade" required>
        </div>
    </div>        
    <input type="hidden" id="latitude" name="latitude" >
    <input type="hidden" id="longitude" name="longitude">
    <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</div>
</form>
<script src="js/form.js"></script>
<script src="js/jquery.mask.js"></script>
