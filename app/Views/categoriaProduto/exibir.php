<?php echo view('includes/head') ?>
<h3 style="text-align: center;"><b>Categoria de Produto</b>.</h3>

<table class="table table-borderless">
    <tr>
        <td colspan="3">
            <label>Descrição:</label>
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <label><?php echo $categoria['descricao'] ?></label>
        </td>
    </tr>
</table>
<?php echo view('includes/sidebar') ?>
<?php echo view('includes/footer') ?>