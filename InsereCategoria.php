<?php
        require_once 'Categoria.php';
        require_once "DB.php";
        if (!empty(trim($_POST['nome'])) && !empty(trim($_POST['descricao']))){
        $nome = ($_POST['nome']);
        $descricao = ($_POST['descricao']);
                
        $cat = new Categora($nome, $descricao);
        
        if(strlen($nome)==0){
            echo 'O campo nome é obrigatório';
        }else{
            if($cat->VerificarCategoria()==0){
                $cat->InserirCategoria();
                 echo '<div class="alert alert-sucess">
                  <strong>Sucesso!</strong> Categoria cadastrada.
                  </div>';
                 echo '<meta http-equiv="refresh" content="5; url=CadastrarCategoria.php">';
            }else {
                echo 'Já existe uma categoria com o nome informado!!';
            }
         }
       
           
       }else {
           echo'<div class="alert alert-danger">
              <strong>Erro ao cadastrar!</strong> Não foi possível cadastrar a categoria.<br />
              Preencha corretamente o formulário de cadastro!!
              </div>';
           echo '<meta http-equiv="refresh" content="5; url=CadastrarCategoria.php">';
       }
       
    

        
        
        
            
        
        
    
        
        
   

   