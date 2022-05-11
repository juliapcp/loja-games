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
            <td>
                <input class="form-control" type="text" name="observacao">
            </td>
        </tr>
    </table>
    <button type="submit">Cadastrar</button>
</form>
<?php echo view('includes/sidebar') ?>
<?php echo view('includes/footer') ?>