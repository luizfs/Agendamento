<html>
    <head>
        <title>Listar Agendamentos - Agendamento</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
        <form action="BuscarAgendamentos.php" method="POST">
            <fieldset>
                <legend>Dodos da Busca</legend>
                <table cellspacing="15">
                    <tr>
                        <td>
                            <label for="cartegoria">Buscar:</label>
                            <select name="lista_agendamento" required="required">
                                   <option value="1">Meus Agendamentos</option>
                                   <option value="2">Todos os Agendamentos</option>
                                </select>
                            <label for="nome">Data Inicial:</label>
                            <input type="text" name="datai" size="30" required="required" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" title="O data deve estar no formato dd/mm/YYYY"> 
                             <label for="nome">Data Final:</label>
                            <input type="text" name="dataf" size="30" required="required" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" title="O data deve estar no formato dd/mm/YYYY">
                        </td>
                    </tr>                            
                      
                </table>
            </fieldset>
        <input type="submit" value="Buscar">
            <input type="reset" value="Limpar">
        </form>
        
    </body>
</html>

