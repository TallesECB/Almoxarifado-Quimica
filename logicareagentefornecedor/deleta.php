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
	echo "Reagente excluido da Tabela Reagente_Fornecedor e Da Tabela Reagentes";
} else if($resultado == 1) {
	echo "Reagente excluido da Tabela Reagente_Fornecedor";
	} else {
		echo "Erro ao deletar o Reagente, tente novamente";
	}