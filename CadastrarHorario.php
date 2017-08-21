<html>
    <head>
        <title>Cadastrar Horario - Agendamento</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
    <form action="InsereHorario.php" method="POST">
            <fieldset>
                <legend>Dados Turma</legend>
                <table cellspacing="15">
                    <tr>
                        <td>
                            <label for="nome">Horario da Aula:</label>
                            <input type="text" name="aula" size="90" required="required" pattern="[a-zA-Zà-úÀ-Ú0-9]|-|_|\s)+$" title="O campo nome deve conter apenas letras e números">
                        </td>
                    </tr>
                </table>
            </fieldset>
            <input type="submit">
            <input type="reset" value="Limpar">
        </form>
        
    </body>
</html>