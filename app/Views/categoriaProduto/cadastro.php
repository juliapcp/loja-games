<?php echo view('includes/head') ?>
<h3 style="text-align: center;"> <?php echo $operacao == 'alteracao' ? "Alterar" : "Cadastrar nova" ?> <b>Categoria de Produto</b>.</h3>

<form action="<?php echo $operacao == 'alteracao' ? '' : 'categorias/cadastro' ?>" method="post">
    <table class="table table-borderless">
        <tr>
            <td colspan="3">
                <label for="descricao">Descrição:</label>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <input value="<?php echo $operacao == 'alteracao' ? $categoria['descricao'] : "" ?>" class="form-control" type="text" name="descricao" size="100" required>
            </td>
        </tr>
    </table>
    <button type="submit"><?php echo $operacao == 'alteracao' ? "Alterar" : "Cadastrar" ?></button>
</form>
<?php echo view('includes/sidebar') ?>
<?php echo view('includes/footer') ?>