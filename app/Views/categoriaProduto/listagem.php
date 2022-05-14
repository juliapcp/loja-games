<?php echo view('includes/head') ?>
<h3 style="text-align: center;">Listagem de <b>Categorias de Produtos</b>.</h3>
<br>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col"><a href="/categorias/cadastro"><i class="fa fa-plus"></i></a></th>
            <th scope="col">Descrição</th>
            <th>Games</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($categoriasProduto as $categoriaProduto) {
            echo "<tr><td></td>
                <td>" . $categoriaProduto['descricao'] . "</td>
                <td>";
        ?>
            <?php
            foreach ($games as $game) {
                if($game['idCategoria'] == $categoriaProduto['id']){
                    echo "<a href=\"/produtos/". $game['idGame']."\"><span class=\"tag tag-firebase tag-lg\">".$game['descricao']."</span></a>";
                }
            }
            ?>
        <?php
            echo "</td>
                <td>
            <a href=\"/categorias/" . $categoriaProduto['id'] . "\"> <i class=\"fa fa-eye\" title=\"Visualizar\"></i></a> 
            <a href=\"/categorias/alterar/" . $categoriaProduto['id'] . "\">  <i class=\"fa fa-pencil\" title=\"Editar\"></i></a> 
            <a  href=\"/categorias/deletar/" . $categoriaProduto['id'] . "\">  <i class=\"fa fa-close\" title=\"Deletar\"></i></a> 
                </td>
                </tr>";
        }
        ?>
    </tbody>
</table>
<?php echo view('includes/sidebar') ?>
<?php echo view('includes/footer') ?>