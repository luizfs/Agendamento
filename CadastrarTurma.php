<html>
    <head>
        <title>Cadastrar Turma - Agendamento</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
    <form action="InsereTurma.php" method="POST">
            <fieldset>
                <legend>Dados Turma</legend>
                <table cellspacing="15">
                    <tr>
                        <td>
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" size="90" required="required" pattern="[a-zA-Zà-úÀ-Ú0-9]|-|_|\s)+$" title="O campo nome deve conter apenas letras e números">
                        </td>
                    </tr>
                </table>
            </fieldset>
            <input type="submit">
            <input type="reset" value="Limpar">
        </form>
        
    </body>
</html>