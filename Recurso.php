<?php

class Recurso{
    public $Nome;
    public $Categoria;
    public $Quantidade;
    
    
    function __construct($nome,$id_categoria,$quantidade) {
        $this->Nome = $nome;
        $this->Categoria = $id_categoria;
        $this->Quantidade = $quantidade;
       
        
    }
    
    function InserirRecurso(){
       $nome = $this->Nome;
       $id_categoria = $this->Categoria;
       $quantidade = $this->Quantidade;
       $data=date("Y-m-d H:i:s", time());
       $status =1;
     
               
   
        $sql_teste  = 'INSERT INTO recurso (id_categoria,nome,quantidade,data,status) ';
        $sql_teste .= 'VALUES (:id_categoria,:nome,:quantidade,:data,:status)';

            try{
               $query_teste = DB::getConexao()->prepare($sql_teste);
               $query_teste->bindValue(':id_categoria',$id_categoria,PDO::PARAM_STR);
               $query_teste->bindValue(':nome',$nome,PDO::PARAM_STR);
               $query_teste->bindValue(':quantidade',$quantidade,PDO::PARAM_STR);
               $query_teste->bindValue(':data',$data,PDO::PARAM_STR);
               $query_teste->bindValue(':status',$status,PDO::PARAM_STR);
               $query_teste->execute();
              	
            }catch (PDOexception $error_insert){
               echo 'Erro ao cadastrar '.$error_insert->getMessage();
            }
          
       }
       
        public function VerificarUsuario(){
        $sql_select = "SELECT nome FROM recurso WHERE nome='$this->Nome'";

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

?>