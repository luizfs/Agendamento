<?php
  require_once 'Functions.php';
  require_once 'DB.php';
  if (!empty(trim($_POST['lista_agendamento']))&& !empty(trim($_POST['datai'])) && !empty(trim($_POST['dataf']))){
      $busca = ($_POST['lista_agendamento']);
      $datai = ($_POST['datai']);
      $dataf = ($_POST['dataf']);
      $id_funcionario = 7;
      

      $func = new Functions();
      $dtibr = $func->InverteData($datai);
      $dtfbr = $func->InverteData($dataf);
      
      switch ($busca){
       case 1;
       $func->ListarMeusAgendamento($id_funcionario,$dtibr,$dtfbr);   
       break;
       case 2;
       $func->ListarTodosAgendamento($dtibr,$dtfbr);
       break;
      }
      }
      ?>
       
