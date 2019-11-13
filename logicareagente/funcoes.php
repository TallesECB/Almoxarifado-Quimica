 <?php  
    require_once('../conecta.php');
   
    function inserirReagenteNovo($conexao,$array){
        try {
            $query = $conexao->prepare("insert into reagentes (NOME_USUAL, NOME_IUPAC, FORMULA, CLASSIFICACAO) values (?, ?, ?, ?)");
            $result = $query->execute($array); 
 
            return $result;
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function buscarReagenteCD($conexao, $array){
        try {
            $query = $conexao->prepare("SELECT NOME_USUAL, NOME_IUPAC, FORMULA, CLASSIFICACAO, ID_REAGENTE FROM REAGENTES WHERE NOME_USUAL= ?");
            
            if($query->execute($array)){
                $reagente = $query->fetchAll(PDO::FETCH_ASSOC); 

                return $reagente;
                echo($reagente);
            }
            else {
                return false;
            }
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  
    }

    function atualizarReagenteCD($conexao, $array) {
        try {
            $query = $conexao->prepare("update reagentes set NOME_USUAL= ?, NOME_IUPAC= ?, FORMULA= ?, CLASSIFICACAO= ? where ID_REAGENTE= ?");
            $result = $query->execute($array); 

            return $result;
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
     }

    function acharReagenteCD($conexao,$array){
        try {
            $query = $conexao->prepare("SELECT NOME_USUAL, NOME_IUPAC, FORMULA, CLASSIFICACAO, ID_REAGENTE FROM REAGENTES WHERE ID_REAGENTE= ?"); 
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

    function excluirReagenteCD($conexao, $array){
        try {
            $query = $conexao->prepare("delete from reagentes where ID_REAGENTE= ?");
            $resultado = $query->execute($array);   

            return $resultado;
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
?>