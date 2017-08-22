<?php

class Funcionario {
    public $Nome;
    public $Email;
    public $Matricula;
    public $Cargo;
    public $Usuario;
    public $Senha;
   
   
    function __construct($nome,$email,$matricula,$cargo,$usuario,$senha) {
        $this->Nome = $nome;
        $this->Email = $email;
        $this->Matricula = $matricula;
        $this->Cargo = $cargo;
        $this->Usuario = $usuario;
        $this->Senha = $senha;
        
      }    
    
        
    public function MostrarFuncionario(){
        echo 'Nome: '.$this->Nome.'<br />';
        echo 'E-mail: '.$this->Email.'<br />';
        echo 'Matricula: '.$this->Matricula.'<br />';
        echo 'Cargo: '.$this->Cargo.'<br />';
        echo 'Usuário: '.$this->Usuario.'<br />';
        echo 'Senha: '.$this->Senha.'<br />';
        echo strlen($this->Senha).'<br />';
       
    }
    
    function InserirFuncionario(){   
       $nome = $this->Nome;
       $email = $this->Email;
       $matricula = $this->Matricula;
       $cargo = $this->Cargo;
       $usuario = $this->Usuario;
       $senha = $this->Senha;
       $data=date("Y-m-d H:i:s", time());
       $status =0;
       $permissao = 1;     
   
        $sql_teste  = 'INSERT INTO funcionario (nome,email,matricula,cargo,usuario,senha,data,status,permissao) ';
        $sql_teste .= 'VALUES (:nome,:email,:matricula,:cargo,:usuario,:senha,:data,:status,:permissao)';

            try{
               $query_teste = DB::getConexao()->prepare($sql_teste);
               $query_teste->bindValue(':nome',$nome,PDO::PARAM_STR);
               $query_teste->bindValue(':email',$email,PDO::PARAM_STR);
               $query_teste->bindValue(':matricula',$matricula,PDO::PARAM_STR);
               $query_teste->bindValue(':cargo',$cargo,PDO::PARAM_STR);
               $query_teste->bindValue(':usuario',$usuario,PDO::PARAM_STR);
               $query_teste->bindValue(':senha',$senha,PDO::PARAM_STR);
               $query_teste->bindValue(':data',$data,PDO::PARAM_STR);
               $query_teste->bindValue(':status',$status,PDO::PARAM_STR);
               $query_teste->bindValue(':permissao',$permissao,PDO::PARAM_STR);
               $query_teste->execute();
              	
            }catch (PDOexception $error_insert){
               echo 'Erro ao cadastrar '.$error_insert->getMessage();
            }
          
       }
    

    public function VerificarUsuario(){
        $sql_select = "SELECT usuario FROM funcionario WHERE usuario='$this->Usuario'";

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
    
     public function VerificarEmail(){
        $sql_select = "SELECT email FROM funcionario WHERE email='$this->Email'";

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
    
}//Fim da Classe