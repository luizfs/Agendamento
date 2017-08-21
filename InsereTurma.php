<?php
        require_once 'Turma.php';
        require_once "DB.php";
        if (!empty(trim($_POST['nome']))){
        $nome = ($_POST['nome']);
                
        $turma = new Turma($nome);
        if(strlen($nome)==0){
            echo 'O campo nome é obrigatório';
        }else{
            if($turma->VerificarTurma()==0){
                $turma->InserirTurma();
                 echo '<div class="alert alert-sucess">
                  <strong>Sucesso!</strong> Turma cadastrada.
                  </div>';
                 echo '<meta http-equiv="refresh" content="5; url=CadastrarTurma.php">';
            }else {
                echo 'Já existe uma turma com o nome informado!!';
            }
         }
       
           
       }else {
           echo'<div class="alert alert-danger">
              <strong>Erro ao cadastrar!</strong> Não foi possível cadastrar a Turma.<br />
              Preencha corretamente o formulário de cadastro!!
              </div>';
           echo '<meta http-equiv="refresh" content="5; url=CadastrarTurma.php">';
       }
       
    

        
        
        
            
        
        
    
        
        
   

   