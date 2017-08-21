<?php

define('HOST', 'localhost');
define('DB', 'agendamento');
define('USER', 'root');
define('PASS', '');

class Db{



private static $conexao = null;


public static function getConexao(){
    
    if(self::$conexao != null)
        return self::$conexao;
    
    
    $cx = 'mysql:host='.HOST.';dbname='.DB;
    
    try{
            self::$conexao = new PDO($cx,USER,PASS);
            self::$conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return self::$conexao;
    }catch (PDOexception $error_conecta){
       echo htmlentities('Erro ao conectar '.$error_conecta->getMessage());
    }
}

public static function dispose(){
 self::$conexao = null;   
}


}

?>