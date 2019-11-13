<?php  
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

require_once('../conecta.php');
require_once('funcoes.php');

$idReagente = $_REQUEST['ID_REAGENTE'];
$array = [];
$array = [$idReagente];

$reagente = acharReagenteCD($conexao, $array);
if($reagente) {
	echo json_encode($reagente);
} else {
	$status = array('status' => 'Não foi encontrado reagente');
	echo json_encode($status);
}


?>