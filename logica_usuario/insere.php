<?php 
/*Cria nova conta de usuário*/ 

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

require_once('../conecta.php');

require_once('funcoes.php'); /*Tem um arquivo funções.php personalizado para cada CRUD*/ 

$json = file_get_contents('php://input'); 

$conteudo = json_decode($json);  
//var_dump ($conteudo); 
//die; 
 $array = [
     $conteudo->login, 
     $conteudo->senha, 
     $conteudo->idade, 
     $conteudo->nome
 ]; 

$resultado = criaContaUser($conexao, $array); /*Transformando o objeto criado em array*/ 

if($resultado){
    echo ('Conta criada com sucesso<br>'); 
}
else {
    echo ('Não foi possível criar a conta<br>'); 
}