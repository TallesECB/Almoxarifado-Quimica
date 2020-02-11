<?php 
//Login do administrador 
//header('Content-type: application/json');
require_once('../conecta.php'); 
require_once('funcoes_admin.php');

$login = $_POST['login']; //recebe o objeto. NÃO transformar em string no JS! 
$senha = $_POST['senha']; 

$senha_encrip = base64_encode($senha); 

$array = array($login, $senha); 

//var_dump($array); 
//die; 
$admin = loginAdmin($conexao, $array); 

if ($admin){
  session_start(); 
   $_SESSION['id'] = $admin['ID_ADMIN']; 
   $_SESSION['nome'] = $admin['NOME_ADMIN']; 
   $_SESSION['telefone'] = $admin['telefone_admin']; 
   
   echo (json_encode(["success"=>true,"admin"=>$_SESSION])); 
   
   //$_SESSION é um array associativo 
}
else {
  echo (json_encode(["success"=>false]));
}



