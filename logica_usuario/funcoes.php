<?php 
 include('../conecta.php');
/*Funções de usuários*/ 

function criaContaUser($conexao, $array){
    try{
        //Tomar cuidado com o tipo dos dados passados 
        //var_dump($array); 
        //die; 
        $query = $conexao-> prepare("INSERT INTO USUARIO (EMAIL_USUARIO, SENHA_USUARIO, IDADE_USUARIO, NOME_USUARIO, IMG_USER)
         VALUES (?, ?, ?, ?, ?)"); 
         //Chaveamento - Não utilizar array associativo, somente numérico
        $resultado = $query->execute($array); 
        return $resultado; 
    }
    catch (PDOException $e){
        echo ('Erro na inserção: '.$e->getMessage()); 
    }
}
function deleta_user($conexao, $array){
    try{
        $query = $conexao->prepare("DELETE FROM USUARIO WHERE ID_USUARIO = ?"); 
        $resultado = $query->execute($array); 
        return $resultado; 
    }
    catch (PDOException $e){
        echo ("Erro no delete: ".$e->getMessage()); 
    }
}

function loginUser($conexao, $array){
 
    try {
        $query = $conexao->prepare("select * from USUARIO where EMAIL_USUARIO = ? and SENHA_USUARIO = ?");
      
        if($query->execute($array)){
            
            $usuario = $query->fetch(); //coloca os dados num array $usuario
           
          if ($usuario){   
              
                return $usuario;
            }
        else{
                return false;
            }
        }
        else{
           
            return false;
        }
         }catch(PDOException $e) {
           
            echo 'Error: ' . $e->getMessage();
      }  
}