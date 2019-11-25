<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
require_once('../conecta.php');
require_once('funcoes.php');

$json = file_get_contents('php://input');
$obj = json_decode($json);


$array = [];
$array = [$obj->idfornec, $obj->idreag];

$resultado = excluirReagente($conexao, $array);

if($resultado == 2) {
	echo "Excluido RF e R";
} else if($resultado == 1) {
	echo "Excluido RF";
	} else {
		echo "Erro ao deletar o Reagente, tente novamente";
	}