<?php
    
    $tel = $_POST['telefone'];
    //echo json_encode($tel);
    if(!empty($tel)){
        require_once $_SERVER['DOCUMENT_ROOT'] . '/pizz/' . "controller/ClienteController.php";
    
        $ctrl = new ClienteController();
        $retorno = $ctrl->BuscaTel($tel);
        $retorno = $retorno[0];
        //var_dump($retorno);
    }
?>
<div class="jumbotron">
    <div class="form-group row">
        <div class="col-sm-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div id="map-canvas" style="height: 400px; width: 640px" ></div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
        <h2><?=$retorno->nome; ?></h2><br /><br />
            <div class="input-group">
                <ul class="list-group">
                    <li class="list-group-item">Rua: <?=$retorno->rua; ?>, N° <?=$retorno->numero;?></li>
                    <li class="list-group-item">Bairro: <?=$retorno->bairro; ?></li>
                    <li class="list-group-item">Cidade: <?=$retorno->cidade; ?></li>
                    <li class="list-group-item">Distância: <span id="distancia"></span></li>
                    <li class="list-group-item">Valor do Frete: <span id="frete"></span></li>
                </ul>
            </div><!-- /input-group -->
        </div>
        <input type="hidden" id="lat" value="<?=$retorno->latitude;?>">
        <input type="hidden" id="lon" value="<?=$retorno->longitude;?>">
    </div>
</div>

<script src="js/map_cliente.js"></script>
