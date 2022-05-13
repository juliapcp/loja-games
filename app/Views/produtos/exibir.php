<?php echo view('includes/head') ?>
<h3 style="text-align: center;"> <b>Produto</b>.</h3>

<table class="table table-borderless">
    <tr>
        <td colspan="3">
            <label><h3><b>Descrição:</h3></b></label>
        </td>

    </tr>
    <tr>
        <td colspan="3">
            <label><?php echo $produto['descricao'] ?></label>
        </td>

    </tr>
    <tr>
        <td>
            <label> <h3><b>Tipo:</h3></b></label>
        </td>
        <td>
            <label><h3><b>Valor base (R$):</h3></b></label>
        </td>
        <td>
            <label><h3><b>Quantidade:</h3></b></label>
        </td>
    </tr>
    <tr>
        <td>
            <label><?php echo $produto['tipo'] ?></label>
        </td>
        <td>
            <label><?php echo $produto['valorBase'] ?></label>
        </td>
        <td>
            <label><?php echo $produto['quantidade'] ?></label>
        </td>

    </tr>
    <tr>
        <td colspan="3">
            <label><h3><b>Categorias:</h3></b></label>
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <select disabled class="multiselect" id="categorias" name="idCategorias[]" multiple="multiple" style="width: 100%;">
                <?php
                foreach ($categorias as $categoria) {
                    echo '<option value="' . $categoria['id'] . '">' . $categoria['descricao'] . '</option>';
                }
                ?>
            </select>

        </td>
    </tr>
</table>

<?php echo view('includes/sidebar') ?>
<?php echo view('includes/footer') ?>
<script>
    $('#categorias').val([
        <?php
        foreach ($categoriasSelecionadas as $categoria) {
            echo "'" . $categoria['idCategoria'] . "',";
        }
        ?>
    ]);
</script>