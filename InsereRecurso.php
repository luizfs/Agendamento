<?php

        require_once 'Recurso.php';
        require_once "DB.php";
        if (!empty(trim($_POST['nome'])) && !empty(trim($_POST['id_categoria'])) && !empty(trim($_POST['quantidade']))){
        $nome = ($_POST['nome']);
        $id_categoria = ($_POST['id_categoria']);
        $quantidade = ($_POST['quantidade']);
        
        $recurso = new Recurso($nome, $id_categoria, $quantidade);
        
             if($recurso->VerificarUsuario()==0){
               $recurso->InserirRecurso();
                   echo '<div class="alert alert-sucess">
                  <strong>Sucesso!</strong> Recurso cadastrado.
                  </div>';
                echo '<meta http-equiv="refresh" content="5; url=CadastrarRecurso.php">';
          
             
          }else{
             echo 'Recurso já Cadastrado!!';
          }
           
        
       }else{
           echo'<div class="alert alert-danger">
              <strong>Erro ao cadastrar!</strong> Não foi possível cadastrar o Recurso.<br />
              Preencha corretamente o formulário de cadastro!!
              </div>';
            echo '<meta http-equiv="refresh" content="5; url=CadastrarRecurso.php">';
           
       }
        
        