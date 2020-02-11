<?php  
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
require_once('../conecta.php');
require_once('funcoes.php');

$json = file_get_contents('php://input');
$obj = json_decode($json);
$array = [];
$array = [$obj->nomeusual, $obj->nomeiupac, $obj->formula, $obj->classificacao];

$resultado = inserirReagenteNovo($conexao, $array);

if($resultado) {
	echo "Inserido com Sucesso na Tabela Reagentes"; //Alterar resposta pro front 
} else {
	echo "Erro ao Inserir";
}



?>