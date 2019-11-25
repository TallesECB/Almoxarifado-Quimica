
<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
require_once('../conecta.php');
require_once('funcoes.php');

$json = file_get_contents('php://input');
$obj = json_decode($json);


$array = [];
$array = [$obj->nomeusual, $obj->nomeiupac, $obj->formula, $obj->classificacao, $obj->idreag];

$resultado = atualizarReagenteCD($conexao, $array);


if($resultado) {
	echo "Alterado";
} else {
	echo "Ocorrou um erro ao alterar o Reagente";
}


?>