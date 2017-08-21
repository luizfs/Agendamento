<?php
if ($_POST && isset($_POST['ativo'])){
  $ativo = $_POST['ativo'];
 
  foreach($ativo as $valor){
   echo $valor.'<br/>';
   // $sql = "INSERT INTO tabela(campo) VALUES ('".$valor."')";
   // echo $sql."<br />";
  }
}		
?>