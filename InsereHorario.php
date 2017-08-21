<?php

        require_once 'Horario.php';
        require_once "DB.php";
        if (!empty(trim($_POST['aula']))){
        $aula = ($_POST['aula']);
                
        $horario = new Horario($aula);
        if(strlen($aula)==0){
            echo 'O campo Aula é obrigatório';
        }else{
            if($horario->VerificarHorario()==0){
                $horario->InserirHorario();
                 echo '<div class="alert alert-sucess">
                  <strong>Sucesso!</strong> Aula cadastrada.
                  </div>';
                 echo '<meta http-equiv="refresh" content="5; url=CadastrarHorario.php">';
            }else {
                echo 'Já existe uma aula com o horario informado!!';
            }
         }
       
           
       }else {
           echo'<div class="alert alert-danger">
              <strong>Erro ao cadastrar!</strong> Não foi possível cadastrar a aula.<br />
              Preencha corretamente o formulário de cadastro!!
              </div>';
           echo '<meta http-equiv="refresh" content="5; url=CadastrarHorario.php">';
       }
       
    

        
        
        
            
        
        
    
        
        
   

   