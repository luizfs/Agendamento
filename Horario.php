<?php
class Horario{
    public $Aula;
    
    function __construct($aula) {
        $this->Aula = $aula;
    }
    
     function InserirHorario(){
       $aula = $this->Aula;
       $data=date("Y-m-d H:i:s", time());
       $status = 1;
   
        $sql_teste  = 'INSERT INTO horario (aula,data) ';
        $sql_teste .= 'VALUES (:aula,:data)';

            try{
               $query_teste = DB::getConexao()->prepare($sql_teste);
               $query_teste->bindValue(':aula',$aula,PDO::PARAM_STR);
               $query_teste->bindValue(':data',$data,PDO::PARAM_STR);
               $query_teste->execute();
              	
            }catch (PDOexception $error_insert){
               echo 'Erro ao cadastrar '.$error_insert->getMessage();
            }
          
       }
    
     public function VerificarHorario(){
        $sql_select = "SELECT aula FROM horario WHERE aula='$this->Aula'";

        try{
            $query_select = DB::getConexao()->prepare($sql_select);
            $query_select->execute();
            $resultado_query = $query_select->fetchAll(PDO::FETCH_ASSOC);
            $count = $query_select->rowCount(PDO::FETCH_ASSOC);
	
        }catch (PDOexception $error_select){
            echo 'Erro ao selecionar '.$error_select->getMessage();
        }
    
	if($count == '0'){
	  return 0;	
	}else{
            return 1;
	}
    }   
}//Fim da classe