<?php  
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

require_once('../conecta.php');
require_once('funcoes.php');

$idFornecedor = $_REQUEST['ID_FORNECEDOR'];
$idReagente = $_REQUEST['ID_REAGENTE'];
$array = [];
$array = [$idFornecedor,$idReagente];

$reagente = acharReagente($conexao, $array);
if($reagente) {
	echo json_encode($reagente);
} else {
	$status = array('status' => 'Não foi encontrado reagente');
	echo json_encode($status);
}


?>