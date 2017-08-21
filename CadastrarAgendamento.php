<html>
    <head>
        <title>Agendar um Recurso- Agendamento</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
        <form action="InsereAgendamento.php" method="POST">
            <fieldset>
                <legend>Dodos do Agendamento</legend>
                <table cellspacing="15">
                     <tr>
                        <td>
                            <label for="nomerecurso">Recurso:</label>
                            <select name="id_recurso" required="required">
                                <?php
                                    require_once "DB.php";
                                    $sql_select = 'SELECT id_recurso,nome FROM recurso order by nome ';

                                     try{
                                         $query_select = DB::getConexao()->prepare($sql_select);
                                         $query_select->execute();
                                         $resultado_query = $query_select->fetchAll(PDO::FETCH_ASSOC);
                                         $count = $query_select->rowCount(PDO::FETCH_ASSOC);

                                        }catch (PDOexception $error_select){
                                         echo 'Erro ao selecionar '.$error_select->getMessage();
                                        }

                                    echo '<option value="">Selecione o Recurso</option>';
                                    if($count > '0'){
                                      foreach($resultado_query as $res){
                                         echo '<option value="'.$res['id_recurso'].'">'.$res['nome'].'</option>';
                                        }
                                    }
                                ?>

                            </select>
                             <label for="nometurma">Turma:</label>
                            <select name="id_turma" required="require">
                                <?php
                                    require_once "DB.php";
                                    $sql_select = 'SELECT id_turma,nome FROM turma order by nome ';

                                     try{
                                         $query_select = DB::getConexao()->prepare($sql_select);
                                         $query_select->execute();
                                         $resultado_query = $query_select->fetchAll(PDO::FETCH_ASSOC);
                                         $count = $query_select->rowCount(PDO::FETCH_ASSOC);

                                        }catch (PDOexception $error_select){
                                         echo 'Erro ao selecionar '.$error_select->getMessage();
                                        }

                                    echo '<option value="">Selecione a Turma</option>';
                                    if($count > '0'){
                                      foreach($resultado_query as $res){
                                        $campo1 = $res['nome'];
                                         echo '<option value="'.$res['id_turma'].'">'.$res['nome'].'</option>';
                                        }
                                    }
                                ?>

                            </select>  
                            <label for="nome">Data:</label>
                            <input type="text" name="data" size="30" required="required" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$">  
                         </td>
                     </tr>
                     <tr>
                         <td>
                             <label for="Horario">Selecione a(s) aula(s):</label>
                              <?php $sql_select = "SELECT id_horario,aula FROM horario";

                                  try{
                                      $query_select = DB::getConexao()->prepare($sql_select);
                                      $query_select->execute();
                                      $resultado_query = $query_select->fetchAll(PDO::FETCH_ASSOC);
                                      $count = $query_select->rowCount(PDO::FETCH_ASSOC);
	
                                  }catch (PDOexception $error_select){
                                      echo 'Erro ao selecionar '.$error_select->getMessage();
                                  }
    
	                          if($count == '0'){
	                            echo 'Não temos aulas cadastradas, favor fazer contato com o administrador';
	                          }else{
                                      foreach ($resultado_query as $res){
                                         echo '<br/> <input type=checkbox name="aula[]" value="'.$res['id_horario'].'">'.$res['aula'].'<br />';
                                      
                                               
                                      }
	                          }
                          ?>    
                         </td>
                        </tr> 
                                            
                            
                        
                </table>
            </fieldset>
            <input type="submit">
            <input type="reset" value="Limpar">
        </form>
        
    </body>
</html>