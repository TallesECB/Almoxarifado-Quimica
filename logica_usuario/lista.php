<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

include("../conecta.php");

    $sql = "SELECT ID_USUARIO, NOME_USUARIO, IDADE_USUARIO, 
	EMAIL_USUARIO, SENHA_USUARIO, IMG_USER
	FROM usuario 
	ORDER BY NOME_USUARIO DESC"; 

try {
	
	$consulta = $conexao->prepare($sql);
	$consulta->execute();

	 $contas = $consulta->fetchAll(PDO::FETCH_ASSOC); /*Transforma em matriz*/ 

		//var_dump($contas); 
	 	//die; 
	  echo(json_encode($contas));  

}
catch(PDOException $ex){
	echo($ex->getMessage());
}

?>