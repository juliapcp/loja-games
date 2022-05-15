<?php echo view('includes/head') ?>
<h3 style="text-align: center;"><b>Venda</b>.</h3>

<table class="table table-borderless">
    <tr>
        <td colspan="3">
            <label for="cliente">Cliente:</label>
        </td>

    </tr>
    <tr>
        <td colspan="3">
            <select disabled class="form-control" name="idCliente" id="cliente" required style="width: 100%;">
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
            <label><?php echo $venda['dataCompra'] ?></label>
        </td>
        <td colspan="2">
            <label><?php echo $venda['observacao'] ?></label>
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
            <select id="produto" disabled class="form-control" name="idProduto" required>
                <?php
                foreach ($produtos as $produto) {
                    echo '<option value="' . $produto['id'] . '">' . $produto['descricao'] . '</option>';
                }
                ?>
            </select>
        </td>
        <td>
            <label><?php echo $venda['quantidade'] ?></label>
        </td>
        <td>
            <label><?php echo $venda['valorUnitario'] ?></label>
        </td>
    </tr>
</table>
<?php echo view('includes/sidebar') ?>
<?php echo view('includes/footer') ?>
<script>
    $('#produto').val([
        <?php
            echo "'" . $venda['idProduto'] . "'";
        ?>
    ]);
    $('#cliente').val([
        <?php
            echo "'" . $venda['idCliente'] . "'";
        ?>
    ]);
</script>