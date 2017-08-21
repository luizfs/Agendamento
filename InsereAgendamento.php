<?php
        require_once 'Agendamento.php';
        require_once "DB.php";
       if (!empty(trim($_POST['id_recurso'])) && !empty(trim($_POST['id_turma'])) && !empty(trim($_POST['data'])) && !empty($_POST['aula'])){
        $aula = $_POST['aula'];
        $id_recurso = ($_POST['id_recurso']);
        $id_turma = ($_POST['id_turma']);
        $data = ($_POST['data']);
        
        function inverteData($data){
            if(count(explode("/",$data)) > 1){
                 return implode("-",array_reverse(explode("/",$data)));
            }
        }
        
       
        
      // $agendamento->MostrarAgendamento();
        foreach($aula as $au){
            $aula = $au;
            $agendamento = new Agendamento($id_recurso, $id_turma, inverteData($data), $aula);
            if($agendamento->VerificarAgendamento()==0){
            $agendamento->InserirAgendamento();
            echo '<strong>Id recurso:</strong> '.$id_recurso.'<br/>';
            echo '<strong>Id turma:</strong> '.$id_turma.'<br/>';
            echo '<strong>data:</strong> '.$data.'<br/>';
            echo '<strong>Id aula:</strong> '.$aula.'<br/>';
            echo '<strong><p style="color:Green;">Reserva realizada!!</strong><p>';
            echo '<hr>';
            
            }else{
              echo 'Id recurso: '.$id_recurso.'<br/>';
              echo 'Id turma: '.$id_turma.'<br/>';
              echo 'data: '.$data.'<br/>';
              echo 'Id aula: '.$aula.'<br/>';
              echo '<strong><p style="color:red;">Não foi possivel realizar esse agendamento!!</strong><p><br />';
               echo 'O recurso não está disponivel para esta data. <br />';
              echo '<hr>';
        }
        }
    }else{
           echo'<div class="alert alert-danger">
              <strong>Erro ao cadastrar!</strong> Não foi possível realizar o agendamento.<br />
              Preencha corretamente o formulário de cadastro!!
              </div>';
            echo '<meta http-equiv="refresh" content="5; url=CadastrarAgendamento.php">';
           
       }
        
    
