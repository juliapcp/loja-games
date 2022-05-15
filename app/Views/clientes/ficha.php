<?php echo view('includes/head') ?>
<h3 style="text-align: center;"><b>Ficha de cliente</b>.</h3>
<h5 style="color: grey;"><b>Dados do cliente</b></h5>


<table class="table table-borderless">
    <tr>
        <td>
            <label for="cliente">Cliente: <b><?php echo $cliente["nome"] ?></b></label>
        </td>
        <td>
            <label for="cliente">E-mail: <b><?php echo $cliente["email"] ?></b></label>
        </td>
        <td>
            <label for="cliente">Celular: <b><?php echo $cliente["celular"] ?></b></label>
        </td>

    </tr>
</table>
<br><br>
<h5 style="color: grey;"><b>Dados das compras do cliente</b></h5>

<?php
if ($vendas != null) {
?>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Data de Venda</th>
                <th scope="col">Observação</th>
                <th scope="col">Produto</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Valor Unitário (R$)</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $totalQuantidade = 0;
        $totalValor = 0;
        foreach ($vendas as $venda) {
            $totalQuantidade +=  $venda['QUANTIDADE'];
            $totalValor +=  $venda['VALORUNITARIO'];
            echo "<tr>
                <td>" . ($venda['DATACOMPRA'] != null ? date_format(date_create($venda['DATACOMPRA']), "d/m/Y") : "") . "</td>
                <td>" . $venda['OBSERVACAO'] . "</td>
                <td>" . $venda['DESCRICAO'] . "</td>
                <td>" . $venda['QUANTIDADE'] . "</td>
                <td>" . $venda['VALORUNITARIO'] . "</td>
                </tr>";
        }
        echo "<tr class=\"table-success\"><td></td><td></td><td><b>Totais:</b></td>
        <td><b>" . $totalQuantidade . "</b></td>
        <td><b>" . $totalValor . "</b></td>
        </tr>";
        echo "<tr class=\"table-success\"><td></td><td></td><td></td><td><b>Total gasto (R$):</b></td>
        <td><b>" . $totalQuantidade * $totalValor . "</b></td>
        </tr>";
    } else {
        echo "<h4 style=\"text-align: center\">Ainda não têm compras por aqui.</h4>";
    }
        ?>
        </tbody>
    </table>
    <?php echo view('includes/sidebar') ?>
    <?php echo view('includes/footer') ?>