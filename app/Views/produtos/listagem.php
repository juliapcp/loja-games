<?php echo view('includes/head') ?>
<?php

function url($campo, $valor)
{
    $result = array();
    if (isset($_GET["descricao"])) $result["descricao"] = "descricao=" . $_GET["descricao"];
    $result[$campo] = $campo . "=" . $valor;
    return ("produtos/listagem?" . strtr(implode("&", $result), " ", "+"));
}
?>

<h3 style="text-align: center;">Listagem de <b>Produtos</b>.</h3>
<br>
<?php echo "<select style=\"border:none\" id=\"campo\" name=\"campo\">\n";
echo "<option value=\"descricao\"" . ((isset($_GET["descricao"])) ? " selected" : "") . ">Descrição</option>\n";
echo "</select>\n";

$value = "";

if (isset($_GET["descricao"])) $value = $_GET["descricao"];
echo "<input style=\"width: 80%\" class=\"w3-button w3-white w3-border w3-round-large\" type=\"text\" id=\"valor\" name=\"valor\" value=\"" . $value . "\" size=\"120\" pattern=\"[a-z\s]+$\"> \n";

echo '<script>';
echo 'var valor = document.querySelector("#valor");';
echo 'valor.addEventListener("input", function () {';
echo 'valor.value = valor.value.toUpperCase();';
echo '});';
echo '</script>';

$parameters = array();
echo "<a href=\"\" onclick=\"value = document.getElementById('valor').value.trim().replace(/ +/g, '+'); result = '" . strtr(implode("&", $parameters), " ", "+") . "'; result = ((value != '') ? document.getElementById('campo').value+'='+value+((result != '') ? '&' : '') : '')+result; this.href ='/produtos/listagem'+((result != '') ? '?' : '')+result;\">&#x1F50E;</a><br>\n";
echo "<br>\n";

?>
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
        if($produtos != null){
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
        }
        ?>
    </tbody>
</table>
<?php echo view('includes/sidebar') ?>
<?php echo view('includes/footer') ?>