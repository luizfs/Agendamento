<html>
    <head>
        <title>Cadastrar Categoria - Agendamento</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
    <form action="InsereCategoria.php" method="POST">
            <fieldset>
                <legend>Dados Categoria</legend>
                <table cellspacing="15">
                    <tr>
                        <td>
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" size="90" required="required" pattern="[a-zA-Zà-úÀ-Ú0-9]|-|_|\s)+$" title="O campo nome deve conter apenas letras e números">
                        </td>
                    </tr>
                    <tr>
                     <td align="left">
                         <label for="email">Descrição:</label>
                            <textarea type="text" name="descricao" rows="3" cols="65" required="required" pattern="[a-zA-Z\s]+$" title="O campo nome deve conter apenas letras"></textarea>
                        </td>
                    </tr>    
                           </table>
            </fieldset>
            <input type="submit">
            <input type="reset" value="Limpar">
        </form>
        
    </body>
</html>