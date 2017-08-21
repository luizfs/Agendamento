<html>
    <head>
        <title>Cadastrar Recurso - Agendamento</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
    <form action="InsereRecurso.php" method="POST">
            <fieldset>
                <legend>Dodos Recursos</legend>
                <table cellspacing="15">
                    <tr>
                        <td>
                            <label for="nome">Nome do recurso:</label>
                            <input type="text" name="nome" size="90" required="required" pattern="[a-zA-Z\s]+$" title="O campo nome deve conter apenas letras">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="cartegoria">Categoria:</label>
                            <select name="id_categoria" required>
                                <?php
                                    require_once "DB.php";
                                    $sql_select = 'SELECT id_categoria,nome FROM categoria order by nome ';

                                     try{
                                         $query_select = DB::getConexao()->prepare($sql_select);
                                         $query_select->execute();
                                         $resultado_query = $query_select->fetchAll(PDO::FETCH_ASSOC);
                                         $count = $query_select->rowCount(PDO::FETCH_ASSOC);

                                        }catch (PDOexception $error_select){
                                         echo 'Erro ao selecionar '.$error_select->getMessage();
                                        }

                                    echo '<option value="">Selecione a categoria</option>';
                                    if($count > '0'){
                                      foreach($resultado_query as $res){
                                        $campo1 = $res['nome'];
                                         echo '<option value="'.$res['id_categoria'].'">'.$res['nome'].'</option>';
                                        }
                                    }
                                ?>

                            </select>
                            <label for="nome">Quantidade:</label>
                            <input type="text" name="quantidade" size="30" required="required" pattern="[0-9]+$" title="O campo nome deve conter apenas números inteiros!"> 
                        </td>
                    </tr>                            
                      
                </table>
            </fieldset>
            <input type="submit">
            <input type="reset" value="Limpar">
        </form>
        
    </body>
</html>