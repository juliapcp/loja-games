<form action="/produto/cadastro" method="post">
    <table>
        <tr>
            <td colspan="3">
                <label for="descricao">Descrição:</label>
            </td>

        </tr>
        <tr>
            <td colspan="3">
                <input type="text" name="descricao" size="100" required>
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
                <input type="text" name="tipo" required>
            </td>
            <td>
                <input type="number" step=0.01 name="valorBase" required>
            </td>
            <td>
                <input type="number" step=0.01 name="quantidade" required>
            </td>
        </tr>
    </table>
    <button type="submit">Cadastrar</button>
</form>