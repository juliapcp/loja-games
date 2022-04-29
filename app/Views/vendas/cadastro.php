<?php echo view('includes/head') ?>
<h3 style="text-align: center;">Cadastrar nova <b>Venda</b>.</h3>

<form action="/produtos/cadastro" method="post">
    <table class="table table-borderless">
        <tr>
            <td colspan="3">
                <label for="descricao">Descrição:</label>
            </td>

        </tr>
        <tr>
            <td colspan="3">
                <input class="form-control" type="text" name="descricao" size="100" required>
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
                <input class="form-control" type="text" name="tipo" required>
            </td>
            <td>
                <input class="form-control" type="number" step=0.01 name="valorBase" required>
            </td>
            <td>
                <input class="form-control" type="number" step=0.01 name="quantidade" required>
            </td>
        </tr>
    </table>
    <button type="submit">Cadastrar</button>
</form>
<?php echo view('includes/sidebar') ?>
<?php echo view('includes/footer') ?>