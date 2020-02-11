 <?php  
    require_once('../conecta.php');
    
	function inserirReagente($conexao,$array){
       try {
            $query = $conexao->prepare("insert into fornecedor_reagente (ID_REAGENTE, ID_FORNECEDOR, VALIDADE, QNTD_ESTOQUE) values (?, ?, ?, ?)");
            $result = $query->execute($array); 

            return $result;
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function buscarReagente($conexao, $array){
        try {
            $query = $conexao->prepare("SELECT NOME_USUAL, NOME_IUPAC, FORMULA, CLASSIFICACAO, VALIDADE, 
            QNTD_ESTOQUE, NOME_FORNECEDOR, ID_REAGENTE, ID_FORNECEDOR, CURRENT_TIMESTAMP FROM REAGENTES JOIN FORNECEDOR_REAGENTE USING (ID_REAGENTE) JOIN FORNECEDOR USING (ID_FORNECEDOR) WHERE NOME_USUAL= ?");
           
           if($query->execute($array)){
                $reagente = $query->fetchAll(PDO::FETCH_ASSOC); 

                return $reagente;
            }
            else{
                return false;
            }
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  
    }

    function atualizarReagente($conexao, $array) {
       try {
            $query = $conexao->prepare("update fornecedor_reagente set QNTD_ESTOQUE= ? where ID_REAGENTE= ? and ID_FORNECEDOR= ?");
            $result = $query->execute($array);

            return $result;
        } catch(PDOException $e) {
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
            else {
                return false;
            }
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  
    }

    function excluirReagente($conexao, $array){
        try {
            $query = $conexao->prepare("delete from fornecedor_reagente where ID_FORNECEDOR= ? and ID_REAGENTE= ?");

            $resultado = $query->execute($array);   
            $idreag = $array[1];

            $delete = $conexao->prepare("select * from fornecedor_reagente where ID_REAGENTE= '$idreag'");
            $delete->execute();
            $delete->fetch();

            $info = 0;

            if($delete->rowCount() == 0){
                $deletereagente = $conexao->prepare("delete from reagentes where ID_REAGENTE= '$idreag'");
                $deletereagente->execute();

                $info = 1;
            }
            if($resultado) {  
                if($info == 1) {
                    return 2;
                } else {
                    return 1;
                }
            }
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
?>