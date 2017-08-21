<?php
        require_once 'Funcionario.php';
        require_once "DB.php";
        if (!empty(trim($_POST['nome'])) && !empty(trim($_POST['email'])) && !empty(trim($_POST['matricula'])) && !empty(trim($_POST['cargo'])) && !empty(trim($_POST['usuario']))&& !empty(trim($_POST['senha'])) && !empty(trim($_POST['confirme_senha']))){
        $nome = ($_POST['nome']);
        $email = ($_POST['email']);
        $email2 = ($_POST['email2']);
        $matricula = ($_POST['matricula']);
        $cargo = ($_POST['cargo']);
        $usuario = ($_POST['usuario']);
        $senha = sha1(($_POST['senha']));
        $confirme_senha = sha1(($_POST['confirme_senha']));
        
        $fun = new Funcionario($nome, $email, $matricula, $cargo, $usuario, $senha);
       
        if($email != $email2){
            echo 'E-mails não coincidem!!';
        }else{
         if($senha == $confirme_senha){
              if($fun->VerificarUsuario()==0){
                 if($fun->VerificarEmail()==0){
                      $fun->MostrarFuncionario();
                      $fun->InserirFuncionario(); 
                   echo '<div class="alert alert-sucess">
                  <strong>Sucesso!</strong> Funcionario cadastrado.
                  </div>';
                echo '<meta http-equiv="refresh" content="5; url=CadastrarFuncionario.php">';
          }else{
              echo 'E-mail já cadastrado!!';
             }
             
          }else{
             echo 'Usuário já cadastrado!!';
          }
            }else{
                 echo 'As senhas não coincidem!!';
           }
        }
       }else{
           echo'<div class="alert alert-danger">
              <strong>Erro ao cadastrar!</strong> Não foi possível cadastrar o funcionario.<br />
              Preencha corretamente o formulário de cadastro!!
              </div>';
            echo '<meta http-equiv="refresh" content="5; url=CadastrarFuncionario.php">';
           
       }
       
     

        
        
        
            
        
        
    
        
        
   

   