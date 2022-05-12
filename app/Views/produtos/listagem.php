<?php echo view('includes/head') ?>
<h3 style="text-align: center;">Listagem de <b>Produtos</b>.</h3>
<br>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col"><a href="/produtos/cadastro"><i class="fa fa-plus"></i></a></th>
            <th scope="col">Descrição</th>
            <th scope="col">Tipo</th>
            <th scope="col">Valor base</th>
            <th scope="col">Quantidade</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach ($produtos as $produto){
                echo "<tr><td></td>
                <td>". $produto['descricao']."</td>
                <td>". $produto['tipo']."</td>
                <td>". $produto['valorBase']."</td>
                <td>". $produto['quantidade']. "</td>
                <td>
                <a href=\"/produtos/" . $produto['id'] . "\"> <i class=\"fa fa-eye\" title=\"Visualizar\"></i></a> 
                <a href=\"/produtos/alterar/" . $produto['id'] . "\">  <i class=\"fa fa-pencil\" title=\"Editar\"></i></a> 
                <a  href=\"/produtos/deletar/" . $produto['id'] . "\">  <i class=\"fa fa-close\" title=\"Deletar\"></i></a> 
                </td>
                </tr>";
            }
        ?>
    </tbody>
</table>
<?php echo view('includes/sidebar') ?>
<?php echo view('includes/footer') ?>