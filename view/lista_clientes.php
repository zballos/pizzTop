<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/pizz/' . "controller/ClienteController.php";
    $clientes = new ClienteController();//::ListarTodos();
    $dados = $clientes->ListarTodos();
    //var_dump($clientes->ListarTodos());
?>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Rua</th>
                <th>Número</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($dados as $cliente) : ?>
            <tr>
                <td><?=$cliente->id; ?></td>
                <td><?=$cliente->nome;?></td>
                <td><?=$cliente->telefone;?></td>
                <td><?=$cliente->rua;?></td>
                <td><?=$cliente->numero;?></td>
                <td><?=$cliente->bairro;?></td>
                <td><?=$cliente->cidade;?></td>
                <td class="col-sm-2">
                    <a href="index.php?page=editar&id=<?=$cliente->id;?>">Editar</a>
                    <a href="index.php?page=excluir&id=<?=$cliente->id;?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
