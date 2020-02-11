<?php 
 header('Access-Control-Allow-Origin: *');
 header('Content-type: application/json');

require_once('../conecta.php');
require_once('funcoes.php');

$json = file_get_contents('php://input');

$conteudo = json_decode($json);
//var_dump ($conteudo); //String 
//die; 
$array = array($conteudo ); 

$resultado = deleta_user($conexao, $array); //No arqivo de funcoes.php 


if($resultado) {
	echo ("Conta de usuário deletada"); 
} else {
	echo ("Não foi possível deletar a conta"); 
}