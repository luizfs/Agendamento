<?php

class Functions{
      
    function InverteData($data){
        if(count(explode("/",$data)) > 1){
            return implode("-",array_reverse(explode("/",$data)));
        }
     }
     
    function SelectBanco($qr,$nome_campo){
    require_once 'DB.php';      
    $sql_select = "$qr";

    try{
	$query_select = DB::getConexao()->prepare($sql_select);
        $query_select->execute();
	$resultado_query = $query_select->fetchAll(PDO::FETCH_ASSOC);
	$count = $query_select->rowCount(PDO::FETCH_ASSOC);
	
    }catch (PDOexception $error_select){
        echo 'Erro ao selecionar '.$error_select->getMessage();
    }
    
	if($count == '0'){
	  echo 'Não existe o cadastro !'; 	
	}else{
	
	foreach($resultado_query as $res){
		$campo_retorno = $res["$nome_campo"];
                
                return $campo_retorno;
            
	}
     }
     DB::dispose();
    }    
    
      function ListarMeusAgendamento($id_funcionario,$dtibr,$dtfbr){
         $sql_select = "SELECT * FROM agendamento where id_funcionario='$id_funcionario' AND data_usarrecurso >='$dtibr' AND data_usarrecurso <='$dtfbr' ORDER BY data_usarrecurso ASC limit 100";

       try{
	 $query_select = DB::getConexao()->prepare($sql_select);
         $query_select->execute();
	 $resultado_query = $query_select->fetchAll(PDO::FETCH_ASSOC);
	 $count = $query_select->rowCount(PDO::FETCH_ASSOC);
	
	
       }catch (PDOexception $error_select){
         echo 'Erro ao selecionar '.$error_select->getMessage();
       }
    
	 if($count == '0'){
	   echo 'Nada encontrado'; 	
	 }else{
	
	 foreach($resultado_query as $res){
		$id_agendamento = $res['id_agendamento'];
		$id_turma = $res['id_turma'];
		$id_recurso = $res['id_recurso'];
		$id_aula = $res['id_aula'];
                $data_usarrecurso = $res['data_usarrecurso'];
                $data = $res['data'];
                echo '<strong>Código do Agendamento:</strong> '.$id_agendamento.'<br />';
                echo '<strong>Recurso:</strong> '.$this->SelectBanco("SELECT nome FROM recurso WHERE id_recurso = '$id_recurso' ", "nome").'<br />';
                echo '<strong>Turma:</strong> '.$this->SelectBanco("SELECT nome FROM turma WHERE id_turma = '$id_turma' ", "nome").'<br />';
		echo '<strong>Aula:</strong> '.$this->SelectBanco("SELECT aula FROM horario WHERE id_horario = '$id_aula' ", "aula").'<br/>';
                echo '<strong>Data da solicitação:</strong> '.date('d/m/Y', strtotime($data)).'<br/>';
                echo '<strong>Data da Utilização:</strong> '.date('d/m/Y', strtotime($data_usarrecurso)).'<br/>';
                echo '<hr>';
//echo $idPost.' - '.$campo1.' - '.$campo2.'<br />';
		
		
	}
    }
        DB::dispose();
      }
    
      function ListarTodosAgendamento($dtibr,$dtfbr){
         $sql_select = "SELECT * FROM agendamento WHERE data_usarrecurso >='$dtibr' AND data_usarrecurso <='$dtfbr' ORDER BY data_usarrecurso ASC limit 100";

       try{
	 $query_select = DB::getConexao()->prepare($sql_select);
         $query_select->execute();
	 $resultado_query = $query_select->fetchAll(PDO::FETCH_ASSOC);
	 $count = $query_select->rowCount(PDO::FETCH_ASSOC);
	
	
       }catch (PDOexception $error_select){
         echo 'Erro ao selecionar '.$error_select->getMessage();
       }
    
	 if($count == '0'){
	   echo '<strong>Não exsiste agendamento no periodo informado!!</strong>'; 	
	 }else{
	
	 foreach($resultado_query as $res){
		$id_agendamento = $res['id_agendamento'];
		$id_turma = $res['id_turma'];
		$id_recurso = $res['id_recurso'];
		$id_aula = $res['id_aula'];
                $data_usarrecurso = $res['data_usarrecurso'];
                $data = $res['data'];
                $id_usuario = $this->SelectBanco("SELECT id_funcionario FROM agendamento", "id_funcionario");
           
                echo '<strong>Código do Agendamento:</strong> '.$id_agendamento.'<br />';
                echo '<strong>Nome do solicitante:</strong>'.$this->SelectBanco("SELECT nome FROM funcionario WHERE id_funcionario='$id_agendamento'", "nome").'<br />';
                echo '<strong>Recurso:</strong> '.$this->SelectBanco("SELECT nome FROM recurso WHERE id_recurso = '$id_recurso' ", "nome").'<br />';
                echo '<strong>Turma:</strong> '.$this->SelectBanco("SELECT nome FROM turma WHERE id_turma = '$id_turma' ", "nome").'<br />';
		echo '<strong>Aula:</strong> '.$this->SelectBanco("SELECT aula FROM horario WHERE id_horario = '$id_aula' ", "aula").'<br/>';
                echo '<strong>Data da solicitação:</strong> '.date('d/m/Y', strtotime($data)).'<br/>';
                echo '<strong>Data da Utilização:</strong> '.date('d/m/Y', strtotime($data_usarrecurso));'<br/>';
                echo '<hr>';

		
		
	}
    }
        DB::dispose();
      }
}//Fim da classe