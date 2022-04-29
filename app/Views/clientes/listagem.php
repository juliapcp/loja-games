<?php echo view('includes/head') ?>
<h3 style="text-align: center;">Listagem de <b>Clientes</b>.</h3>
<br>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col"><a href="/clientes/cadastro"><i class="fa fa-plus"></i></a></th>
            <th scope="col">Nome</th>
            <th scope="col">Celular</th>
            <th scope="col">E-mail</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach ($clientes as $cliente){
                echo "<tr><td></td>
                <td>". $cliente['nome']."</td>
                <td>". $cliente['celular']."</td>
                <td>". $cliente['email']."</td>
                <td></td>
                </tr>";
            }
        ?>
    </tbody>
</table>
<?php echo view('includes/sidebar') ?>
<?php echo view('includes/footer') ?>