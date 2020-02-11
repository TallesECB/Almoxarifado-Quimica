<?php 
//header('Content-type: application/json');
require_once('../conecta.php'); 
require_once('funcoes.php');

$login = $_POST['email_user']; //recebe o objeto. NÃO transformar em string no JS! 
$senha = $_POST['senha_user']; 

//$senha_encrip = base64_encode($senha); 

$array = array($login, $senha); 

//var_dump($array); 
//die; 

$usuario = loginUser($conexao, $array); 


if ($usuario){
  session_start(); 
   $_SESSION['id'] = $usuario['ID_USUARIO']; 
   $_SESSION['nome'] = $usuario['NOME_USUARIO']; 
   $_SESSION['profissao'] = $usuario['PROFISSAO_USUARIO']; 
   
  echo json_encode(["codigo" => "1","usuario"=>$_SESSION]);  
   //$_SESSION é um array associativo 
}
else {
  echo (json_encode(["codigo"=> "0"]));
} 