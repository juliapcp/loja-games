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
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach ($clientes as $cliente){
                echo "<tr><td></td>
                <td>". $cliente['nome']."</td>
                <td>". $cliente['celular']."</td>
                <td>". $cliente['email']. "</td>
                <td>
                <a href=\"/clientes/" . $cliente['id'] . "\"> <i class=\"fa fa-eye\" title=\"Visualizar\"></i></a> 
                <a href=\"/clientes/alterar/" . $cliente['id'] . "\">  <i class=\"fa fa-pencil\" title=\"Editar\"></i></a> 
                <a  href=\"/clientes/deletar/" . $cliente['id'] . "\">  <i class=\"fa fa-close\" title=\"Deletar\"></i></a> 
                </td>
                <td>
                <a href=\"/clientes/ficha/".$cliente['id']."\">
                    <button>Gerar ficha</button>
                </a>
                </td>
                </tr>";
            }
        ?>
    </tbody>
</table>
<?php echo view('includes/sidebar') ?>
<?php echo view('includes/footer') ?>