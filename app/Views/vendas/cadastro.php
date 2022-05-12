<?php echo view('includes/head') ?>
<h3 style="text-align: center;">Cadastrar nova <b>Venda</b>.</h3>

<form action="/vendas/cadastro" method="post">
    <table class="table table-borderless">
        <tr>
            <td colspan="3">
                <label for="cliente">Cliente:</label>
            </td>

        </tr>
        <tr>
            <td colspan="3">
                <select class="form-control" name="idCliente" required style="width: 100%;">
                    <option value="" disabled selected>Selecionar cliente</option>
                    <?php
                    foreach ($clientes as $cliente) {
                        echo '<option value="' . $cliente['id'] . '">' . $cliente['nome'] . '</option>';
                    }
                    ?>
                </select>
            </td>

        </tr>
        <tr>
            <td>
                <label for="dataCompra">Data da Venda:</label>
            </td>
            <td>
                <label for="observacao">Observaçâo:</label>
            </td>
        </tr>
        <tr>
            <td>
                <input class="form-control" type="date" name="dataCompra" required>
            </td>
            <td colspan="2">
                <input class="form-control" type="text" name="observacao">
            </td>
        </tr>
        <tr>
            <td>
                <label for="idProduto">Produto:</label>
            </td>
            <td>
                <label for="quantidade">Quantidade:</label>
            </td>
            <td>
                <label for="valorUnitario">Valor unitário (R$):</label>
            </td>
        </tr>
        <tr>
            <td>
                <select class="form-control" name="idProduto" required>
                    <option value="" disabled selected>Selecionar produto</option>
                    <?php
                    foreach ($produtos as $produto) {
                        echo '<option value="' . $produto['id'] . '">' . $produto['descricao'] . '</option>';
                    }
                    ?>
                </select>
            </td>
            <td>
                <input class="form-control" type="number" name="quantidade">
            </td>
            <td>
                <input class="form-control" type="number" step=0.01 name="valorUnitario">
            </td>
        </tr>
    </table>
    <button type="submit">Cadastrar</button>
</form>
<?php echo view('includes/sidebar') ?>
<?php echo view('includes/footer') ?>