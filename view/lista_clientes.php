<?php

use controller\ClienteController;

$clientes = new ClienteController();
$dados = $clientes->listarTodos();
?>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Rua</th>
                <th>Número</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th width="120px"></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($dados as $cliente) : ?>
            <tr>
                <td><?=$cliente->id; ?></td>
                <td><?=$cliente->nome;?></td>
                <td><?=$cliente->telefone;?></td>
                <td><?=$cliente->rua;?></td>
                <td><?=$cliente->numero;?></td>
                <td><?=$cliente->bairro;?></td>
                <td><?=$cliente->cidade;?></td>
                <td width="120px">
                    <a href="index.php?page=editar&id=<?=$cliente->id;?>">Editar</a>
                    <a href="index.php?page=excluir&id=<?=$cliente->id;?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
