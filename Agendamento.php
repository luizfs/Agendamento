<?php

class Agendamento{
    public $Usuário;
    public $Recurso;
    public $Turma;
    public $Data;
    public $Aula;
   
    
    function __construct($id_recurso,$id_turma,$data,$aula) {
        $this->Recurso = $id_recurso;
        $this->Turma = $id_turma;
        $this->Data = $data;
        $this->Aula = $aula;
        
    }
    
     function InserirAgendamento(){
       $id_aula = $this->Aula;
       $id_recurso = $this->Recurso;
       $id_turma = $this->Turma;
       $data_usarrecurso = $this->Data;
       $data=date("Y-m-d H:i:s", time());
       $status = 1;
       $id_funcionario = 7;
               
   
        $sql_teste  = 'INSERT INTO agendamento (id_funcionario,id_recurso,id_turma,data_usarrecurso,id_aula,data,status) ';
        $sql_teste .= 'VALUES (:id_funcionario,:id_recurso,:id_turma,:data_usarrecurso,:id_aula,:data,:status)';

            try{
               $query_teste = DB::getConexao()->prepare($sql_teste);
               $query_teste->bindValue(':id_funcionario',$id_funcionario,PDO::PARAM_STR);
               $query_teste->bindValue(':id_recurso',$id_recurso,PDO::PARAM_STR);
               $query_teste->bindValue(':id_turma',$id_turma,PDO::PARAM_STR);
               $query_teste->bindValue(':data_usarrecurso',$data_usarrecurso,PDO::PARAM_STR);
               $query_teste->bindValue(':id_aula',$id_aula,PDO::PARAM_STR);
               $query_teste->bindValue(':data',$data,PDO::PARAM_STR);
               $query_teste->bindValue(':status',$status,PDO::PARAM_STR);
               $query_teste->execute();
              	
            }catch (PDOexception $error_insert){
               echo 'Erro ao cadastrar '.$error_insert->getMessage();
            }
            
       }
     
     
    public function MostrarAgendamento(){
        foreach($this->Aula as $aula){
            $this->Aula = $aula;
            echo 'Id recurso: '.$this->Recurso.'<br/>';
            echo 'Id turma: '.$this->Turma.'<br/>';
            echo 'data: '.$this->Data.'<br/>';
            echo 'Id aula: '.$this->Aula.'<br/>';
            echo '<hr>';
         }
        
    }
    
     public function VerificarAgendamento(){
        $sql_select = "SELECT id_recurso,data_usarrecurso,id_aula FROM agendamento WHERE id_recurso='$this->Recurso' AND data_usarrecurso='$this->Data' AND id_aula='$this->Aula'";

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

