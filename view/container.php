<?php
$get = !empty($_GET['page']) ? $_GET['page'] : null;
$label = "";
$url = "";
if ($get == null) {
    $url = "index.php?page=novo";
    $label = "Novo Cliente";
}
if (($get == "novo") || ($get == "editar") || ($get == "bcli")) {
    $url = "index.php";
    $label = "Voltar";
}

?>
<div class="header clearfix">
    <h3 class="text-muted">PizzTOP 
        <span class="pull-right">
            <a class="btn btn-link btn-block" role="button" href="<?php echo $url; ?>"><?php echo $label; ?></a>
        </span>
    </h3>
</div>
<?php
switch ($get) {
    case 'novo':
        require "tela_novo_cliente.php";
        require "lista_clientes.php";
        break;
    case 'editar':
        require "tela_editar_cliente.php";
        break;
    case '':
        require "tela_atendente.php";
        break;
    case 'excluir':
        require "deletar_cliente.php";
        break;
    case 'bcli':
        require "busca_cliente.php";
        break;
    default:
        require "tela_atendente.php";
        require "lista_clientes.php";
        break;
}
