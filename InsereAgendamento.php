<?php
        require_once 'Agendamento.php';
        require_once 'Functions.php';
        require_once "DB.php";
       if (!empty(trim($_POST['id_recurso'])) && !empty(trim($_POST['id_turma'])) && !empty(trim($_POST['data'])) && !empty($_POST['aula'])){
        $aula = $_POST['aula'];
        $id_recurso = ($_POST['id_recurso']);
        $id_turma = ($_POST['id_turma']);
        $data = ($_POST['data']);
        
        $func = new Functions();

             
        
      // $agendamento->MostrarAgendamento();
        foreach($aula as $au){
            $aula = $au;
            $agendamento = new Agendamento($id_recurso, $id_turma, $func->InverteData($data), $aula);
            if($agendamento->VerificarAgendamento()==0){
            $agendamento->InserirAgendamento();
            echo 'Nome do recurso: '.$func->SelectBanco("SELECT nome FROM recurso WHERE id_recurso = '$id_recurso' ", "nome").'<br/>';
            echo 'Nome da turma: '.$func->SelectBanco("SELECT nome FROM turma WHERE id_turma = '$id_turma' ", "nome").'<br/>';
            echo 'Data: '.$data.'<br/>';
            echo 'Aula: '.$func->SelectBanco("SELECT aula FROM horario WHERE id_horario = '$aula' ", "aula").'<br/>';
            echo '<strong><p style="color:Green;">Reserva realizada!!</strong><p>';
            echo '<hr>';
            
            }else{
              echo 'Nome do recurso: '.$func->SelectBanco("SELECT nome FROM recurso WHERE id_recurso = '$id_recurso' ", "nome").'<br/>';
              echo 'Nome da turma: '.$func->SelectBanco("SELECT nome FROM turma WHERE id_turma = '$id_turma' ", "nome").'<br/>';
              echo 'Data: '.$data.'<br/>';
              echo 'Aula: '.$func->SelectBanco("SELECT aula FROM horario WHERE id_horario = '$aula' ", "aula").'<br/>';
              echo '<strong><p style="color:red;">Não foi possivel realizar esse agendamento!!</strong><p><br />';
               echo 'O recurso não está disponivel para esta data. <br />';
              echo '<hr>';
        }
        }
        echo '<center><p><strong><a href="CadastrarAgendamento.php">Fazer novo agendamento</a>'.' | '.'<a href="ListarAgendamentos.php">Agendamentos</a></strong><p></center>';
    }else{
           echo'<div class="alert alert-danger">
              <strong>Erro ao cadastrar!</strong> Não foi possível realizar o agendamento.<br />
              Preencha corretamente o formulário de cadastro!!
              </div>';
            echo '<meta http-equiv="refresh" content="5; url=CadastrarAgendamento.php">';
           
       }
        
    
