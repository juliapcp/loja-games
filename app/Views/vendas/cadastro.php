<?php echo view('includes/head') ?>
<h3 style="text-align: center;"> <?php echo $operacao == 'alteracao' ? "Alterar" : "Cadastrar nova" ?> <b>Venda</b>.</h3>

<form action="<?php echo $operacao == 'alteracao' ? '' : '/vendas/cadastro' ?>" method="POST">
    <table class="table table-borderless">
        <tr>
            <td colspan="3">
                <label for="cliente">Cliente:</label>
            </td>

        </tr>
        <tr>
            <td colspan="3">
                <select class="form-control" name="idCliente" id="cliente" required style="width: 100%;">
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
                <input value="<?php echo $operacao == 'alteracao' ? $venda['dataCompra'] : "" ?>" class="form-control" type="date" name="dataCompra" required>
            </td>
            <td colspan="2">
                <input value="<?php echo $operacao == 'alteracao' ? $venda['observacao'] : "" ?>" class="form-control" type="text" name="observacao">
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
                <select id="produto" class="form-control" name="idProduto" required>
                    <option value="" disabled selected>Selecionar produto</option>
                    <?php
                    foreach ($produtos as $produto) {
                        echo '<option value="' . $produto['id'] . '">' . $produto['descricao'] . '</option>';
                    }
                    ?>
                </select>
            </td>
            <td>
                <input value="<?php echo $operacao == 'alteracao' ? $venda['quantidade'] : "" ?>" class="form-control" type="number" name="quantidade">
            </td>
            <td>
                <input value="<?php echo $operacao == 'alteracao' ? $venda['valorUnitario'] : "" ?>" class="form-control" type="number" step=0.01 name="valorUnitario">
            </td>
        </tr>
    </table>
    <button type="submit"><?php echo $operacao == 'alteracao' ? "Alterar" : "Cadastrar" ?></button>
</form>
<?php echo view('includes/sidebar') ?>
<?php echo view('includes/footer') ?>
<script>
    $('#produto').val([
        <?php
        if ($operacao == 'alteracao') {
                echo "'" . $venda['idProduto'] . "'";
        }
        ?>
    ]);
    $('#cliente').val([
        <?php
        if ($operacao == 'alteracao') {
                echo "'" . $venda['idCliente'] . "'";
        }
        ?>
    ]);
</script>