<?php  
	require_once('conecta.php');
	 function inserirReagente($conexao,$array){
       try {
            $query = $conexao->prepare("insert into reagente (nomereag, fornecedor, quant) values (?, ?, ?)");
            $result = $query->execute($array);
            return $result;
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

     function buscarReagente($conexao,$array){
        try {
        $query = $conexao->prepare("select * from reagente where nomereag= ?");
        if($query->execute($array)){
            $reagente = $query->fetchAll(PDO::FETCH_ASSOC); 
            return $reagente;
        }
        else{
            return false;
        }
         }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  
    }

     function acharReagente($conexao,$array){
        try {
        $query = $conexao->prepare("select * from reagente where nomereag= ?");
        if($query->execute($array)){
            $reagente = $query->fetch(PDO::FETCH_ASSOC); 
            return $reagente;
        }
        else{
            return false;
        }
         }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  
    }

    function atualizarReagente($conexao, $array) {
       try {
            $query = $conexao->prepare("update reagente set nomereag= ?, fornecedor= ?, quant = ? where nomereag = ?");
            $result = $query->execute($array);   
            return $result;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    function excluirReagente($conexao, $array){
        try {
            $query = $conexao->prepare("delete from reagente where nomereag = ?");
            $resultado = $query->execute($array);   
             return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }



?>