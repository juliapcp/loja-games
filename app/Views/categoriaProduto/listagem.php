<?php echo view('includes/head') ?>
<h3 style="text-align: center;">Listagem de <b>Categorias de Produtos</b>.</h3>
<br>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col"><a href="/categorias/cadastro"><i class="fa fa-plus"></i></a></th>
            <th scope="col">Descrição</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($categoriasProduto as $categoriaProduto) {
            echo "<tr><td></td>
                <td>" . $categoriaProduto['descricao'] . "</td>
                <td></td>
                </tr>";
        }
        ?>
    </tbody>
</table>
<?php echo view('includes/sidebar') ?>
<?php echo view('includes/footer') ?>