<?php
/**
 * @author Edson
 */
?>
<div class="jumbotron">
    <form method="POST" action="index.php?page=bcli">
        <div class="form-group row">
            <div class="col-sm-4">
                <h2>Pizzaria PizzTOP</h2><br/><br/>
                <h4>Consultar telefone</h4>

                <div class="input-group">
                    <input type="text" name="telefone" class="form-control col-sm-3 bt" id="telefone"
                           placeholder="(00) 0000-0000">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" id="buscar">Buscar</button>
                </span>
                </div>
                <!-- /input-group -->
            </div>
            <div class="col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div id="map-canvas" style="height: 400px; width: 640px"></div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="js/map.js"></script>
