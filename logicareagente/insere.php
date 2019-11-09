<?php  
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
require_once('conecta.php');
require_once('funcoes.php');

$json = file_get_contents('php://input');
$obj = json_decode($json);
$array = [];
$array = [$obj->reagentenome, $obj->reagentefornecedor, $obj->validadereag, $obj->quantreag];

$resultado = inserirReagente($conexao, $array);


if($resultado) {
	echo "Inserido com Sucesso";
} else {
	echo "Erro ao Inserir";
}



?>