<?php echo view('includes/head') ?>
<h3 style="text-align: center;">Listagem de <b>Vendas</b>.</h3>
<br>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col"><a href="/vendas/cadastro"><i class="fa fa-plus"></i></a></th>
            <th scope="col">Id Cliente</th>
            <th scope="col">Data de Venda</th>
            <th scope="col">Observação</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($vendas as $venda) {
            echo "<tr><td></td>
                <td>" . $venda['idCliente'] . "</td>
                <td>" . $venda['dataCompra'] . "</td>
                <td>" . $venda['observacao'] . "</td>
                <td></td>
                </tr>";
        }
        ?>
    </tbody>
</table>
<?php echo view('includes/sidebar') ?>
<?php echo view('includes/footer') ?>