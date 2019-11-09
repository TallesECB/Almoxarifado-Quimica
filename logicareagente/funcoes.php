<?php  
	require_once('conecta.php');
	 function inserirReagente($conexao,$array){
       try {
            $query = $conexao->prepare("insert into fornecedor_reagente (ID_REAGENTE, ID_FORNECEDOR, VALIDADE, QNTD_ESTOQUE) values (?, ?, ?, ?)");
            $result = $query->execute($array); 
            echo($result);
            return $result;
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

     function inserirReagenteNovo($conexao,$array){
       try {
            $query = $conexao->prepare("insert into reagentes (NOME_USUAL, NOME_IUPAC, FORMULA, CLASSIFICACAO) values (?, ?, ?, ?)");
            $result = $query->execute($array); 
            echo($result);
            return $result;
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

     function buscarReagente($conexao, $array){
        try {
            $query = $conexao->prepare("SELECT NOME_USUAL, NOME_IUPAC, FORMULA, CLASSIFICACAO, VALIDADE, 
            QNTD_ESTOQUE, NOME_FORNECEDOR, ID_REAGENTE, ID_FORNECEDOR FROM REAGENTES JOIN FORNECEDOR_REAGENTE USING (ID_REAGENTE) JOIN FORNECEDOR USING (ID_FORNECEDOR) WHERE NOME_USUAL= ?");
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

    function atualizarReagente($conexao, $array) {
       try {
            $query = $conexao->prepare("update fornecedor_reagente set QNTD_ESTOQUE= ? where ID_REAGENTE= ? and ID_FORNECEDOR= ?");
            $result = $query->execute($array);   
            return $result;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    function acharReagente($conexao,$array){
        try {
            $query = $conexao->prepare("SELECT NOME_USUAL, NOME_IUPAC, FORMULA, CLASSIFICACAO, VALIDADE, 
            QNTD_ESTOQUE, NOME_FORNECEDOR, ID_REAGENTE, ID_FORNECEDOR
            FROM REAGENTES
            JOIN FORNECEDOR_REAGENTE USING (ID_REAGENTE)
            JOIN FORNECEDOR USING (ID_FORNECEDOR) 
            WHERE ID_FORNECEDOR= ? and ID_REAGENTE= ?"); 
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

    function excluirReagente($conexao, $array){
        try {
            $query = $conexao->prepare("delete from fornecedor_reagente where ID_FORNECEDOR= ? and ID_REAGENTE= ?");
            /* por uma verificação, se não tiver mais nem um fornecedor_reagente 
            que possua aquele id_reagente, apagar ele da tabela de reagentes tbm */
            $resultado = $query->execute($array);   
             return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

?>