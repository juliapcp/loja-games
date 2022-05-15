<?php echo view('includes/head') ?>
<h3 style="text-align: center;"> <?php echo $operacao == 'alteracao' ? "Alterar" : "Cadastrar novo" ?> <b>Produto</b>.</h3>

<form action="<?php echo $operacao == 'alteracao' ? '' : '/produtos/cadastro' ?>" method="POST">
    <table class="table table-borderless">
        <tr>
            <td colspan="3">
                <label for="descricao">Descrição:</label>
            </td>

        </tr>
        <tr>
            <td colspan="3">
                <input value="<?php echo $operacao == 'alteracao' ? $produto['descricao'] : "" ?>" class="form-control" type="text" name="descricao" size="100" required>
            </td>

        </tr>
        <tr>
            <td>
                <label for="tipo">Tipo:</label>
            </td>
            <td>
                <label for="valorBase">Valor base (R$):</label>
            </td>
            <td>
                <label for="quantidade">Quantidade:</label>
            </td>
        </tr>
        <tr>
            <td>
                <input value="<?php echo $operacao == 'alteracao' ? $produto['tipo'] : "" ?>" class="form-control" type="text" name="tipo" required>
            </td>
            <td>
                <input value="<?php echo $operacao == 'alteracao' ? $produto['valorBase'] : "" ?>" class="form-control" type="number" step=0.01 name="valorBase" required>
            </td>
            <td>
                <input value="<?php echo $operacao == 'alteracao' ? $produto['quantidade'] : "" ?>" class="form-control" type="number" step=0.01 name="quantidade" required>
            </td>

        </tr>
        <tr>
            <td colspan="3">
                <label for="idCategorias">Categorias:</label>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <select class="multiselect" id="categorias" name="idCategorias[]" multiple="multiple" style="width: 100%;">
                    <?php
                    foreach ($categorias as $categoria) {
                        echo '<option value="' . $categoria['id'] . '">' . $categoria['descricao'] . '</option>';
                    }
                    ?>
                </select>

            </td>
        </tr>
    </table>
    <button type="submit"><?php echo $operacao == 'alteracao' ? "Alterar" : "Cadastrar" ?></button>

</form>
<?php echo view('includes/sidebar') ?>
<?php echo view('includes/footer') ?>
<script>
    $('#categorias').val([
        <?php
        if ($operacao == 'alteracao') {
            foreach ($categoriasSelecionadas as $categoria) {
                echo "'" . $categoria['idCategoria'] . "',";
            }
        }
        ?>
    ]);
</script>