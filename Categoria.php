<?php

class Categora{
    public $Nome;
    public $Descricao;

    public function __construct($nome,$descricao) {
        $this->Nome = $nome;
        $this->Descricao = $descricao;
    }

    function InserirCategoria(){
       $nome = $this->Nome;
       $descricao = $this->Descricao;
       $data=date("Y-m-d H:i:s", time());
       $status = 1;
   
        $sql_teste  = 'INSERT INTO categoria (nome,descricao,data,status) ';
        $sql_teste .= 'VALUES (:nome,:descricao,:data,:status)';

            try{
               $query_teste = DB::getConexao()->prepare($sql_teste);
               $query_teste->bindValue(':nome',$nome,PDO::PARAM_STR);
               $query_teste->bindValue(':descricao',$descricao,PDO::PARAM_STR);
               $query_teste->bindValue(':data',$data,PDO::PARAM_STR);
                $query_teste->bindValue(':status',$status,PDO::PARAM_STR);
               $query_teste->execute();
              	
            }catch (PDOexception $error_insert){
               echo 'Erro ao cadastrar '.$error_insert->getMessage();
            }
          
       }
    
     public function VerificarCategoria(){
        $sql_select = "SELECT nome FROM categoria WHERE nome='$this->Nome'";

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
    

