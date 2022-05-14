<?php echo view('includes/head') ?>
<h3 style="text-align: center;"><b>Cliente</b>.</h3>

<table class="table table-borderless">
    <tr>
        <td colspan="3">
            <label>Nome:</label>
        </td>

    </tr>
    <tr>
        <td colspan="3">
            <label><?php echo $cliente['nome'] ?></label>
        </td>

    </tr>
    <tr>
        <td>
            <label>Celular:</label>
        </td>
        <td>
            <label>E-mail:</label>
        </td>
    </tr>
    <tr>
        <td>
            <label><?php echo $cliente['celular'] ?></label>
        </td>
        <td>
            <label><?php echo $cliente['email'] ?></label>
        </td>
    </tr>
</table>
<?php echo view('includes/sidebar') ?>
<?php echo view('includes/footer') ?>