<?php
include("../conecta.php");
$sql = "select * from reagentes order by ID_REAGENTE";

try {
	
	$consulta = $conexao->prepare($sql);
	$consulta->execute();

	$vetResposta = array();
	while ($registro = $consulta->fetch(PDO::FETCH_ASSOC)) {
		array_push($vetResposta,$registro);
	}
	echo(json_encode($vetResposta));

}
catch(PDOException $ex){
	echo($ex->getMessage());
}

?>