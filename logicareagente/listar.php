<?php
include("conecta.php");
$sql = "select NOME_USUAL, NOME_IUPAC, FORMULA, CLASSIFICACAO, VALIDADE, 
QNTD_ESTOQUE, NOME_FORNECEDOR, ID_REAGENTE, ID_FORNECEDOR
from REAGENTES
join FORNECEDOR_REAGENTE using (ID_REAGENTE)
join FORNECEDOR using (ID_FORNECEDOR) 
order by VALIDADE";

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