<html>
    <head>
        <title>Cadastrar Usuário - Agendamento</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
    <form action="InsereFuncionario.php" method="POST">
            <fieldset>
                <legend>Dados Pessoais</legend>
                <table cellspacing="15">
                    <tr>
                        <td>
                            <label for="nome">Nome completo:</label>
                            <input type="text" name="nome" size="90" required="required" pattern="[a-zA-Z\s]+$" title="O campo nome deve conter apenas letras">
                        </td>
                    </tr>
                    <tr>
                        <td align="left">
                            <label for="email">E-mail:</label>
                            <input type="text" name="email" size="100" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="O campo E-mail deve conter um endereço valido -> exemplo@exemplo.com">
                        </td>
                    </tr>    
                    <tr>    
                        <td>
                            <label for="email2">Confirme o e-mail:</label>
                            <input type="text" name="email2" size="88" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="O campo E-mail deve conter um endereço valido -> exemplo@exemplo.com">
                        </td>
                    </tr> 
                    <tr>
                        <td>
                            <label for="matricula">N° da matricula:</label>
                            <input type="text" name="matricula" size="30" required="required" pattern="[0-9]+$" title="O campo matricula deve conter apenas números inteiros!">
                            <label for="cargo">Cargo:</label>
                            <select name="cargo"> 
                                <option value="Academico">Academico</option>
                                <option value="Estagiário">Estagiário</option> 
                                <option value="Coordenador">Coordenador</option>
                                <option value="Professor">Professor</option></select>
                        </td>
                    </tr> 
                    <tr>    
                        <td>
                            <label for="usuario">Usuário:</label>
                            <input type="text" name="usuario" size="30" required="required" pattern="[a-zA-Z\s]+$" title="O campo usuário deve conter apenas letras">
                            <label for="senha">Senha:</label>
                            <input type="password" name="senha" size="30" required="required" pattern="[a-zA-Z0-9]{6,8}" title="O campo senha deve conter de 6 a 8 caracteres sendo esses letras ou números!">
                             <label for="senha">Confirme a senha:</label>
                            <input type="password" name="confirme_senha" size="30" required="required" pattern="[a-zA-Z0-9]{6,8}" title="O campo senha deve conter de 6 a 8 caracteres sendo esses letras ou números!">
                        </td>
                    </tr>
                    
                </table>
            </fieldset>
            <input type="submit">
            <input type="reset" value="Limpar">
        </form>
        
    </body>
</html>