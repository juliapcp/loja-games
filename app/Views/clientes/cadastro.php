<?php echo view('includes/head') ?>
<h3 style="text-align: center;">Cadastrar novo <b>Cliente</b>.</h3>

<form action="/clientes/cadastro" method="post">
    <table class="table table-borderless">
        <tr>
            <td colspan="3">
                <label for="nome">Nome:</label>
            </td>

        </tr>
        <tr>
            <td colspan="3">
                <input class="form-control" type="text" name="nome" size="100" required>
            </td>

        </tr>
        <tr>
            <td>
                <label for="celular">Celular:</label>
            </td>
            <td>
                <label for="email">E-mail:</label>
            </td>
        </tr>
        <tr>
            <td>
                <input class="form-control" type="tel" pattern="^\(?(?:[14689][1-9]|2[12478]|3[1234578]|5[1345]|7[134579])\)? ?(?:[2-8]|9[1-9])[0-9]{3}\-?[0-9]{4}$" name="celular" placeholder="(99) 9999-9999" required>
            </td>
            <td>
                <input class="form-control" type="email" name="email" required>
            </td>
        </tr>
    </table>
    <button type="submit">Cadastrar</button>
</form>
<?php echo view('includes/sidebar') ?>
<?php echo view('includes/footer') ?>