
<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
require_once('../conecta.php');
var_dump($conexao);
require_once('funcoes.php');

$json = file_get_contents('php://input');
$obj = json_decode($json);


$array = [];
$array = [$obj->quantreag, $obj->idreag, $obj->idfornec];

$resultado = atualizarReagente($conexao, $array);


if($resultado) {
	echo "Alterado";
} else {
	echo "Ocorrou um erro ao alterar o Reagente";
}


?>