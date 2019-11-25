<?php 
 require_once('../conecta.php');
/*Funções de usuários*/ 


function criaContaUser($conexao, $array){
    try{
        //Tomar cuidado com o tipo dos dados passados 
         
        var_dump($array); 

        $query = $conexao-> prepare("INSERT INTO USUARIO (LOGIN_USUARIO, SENHA_USUARIO, IDADE_USUARIO, NOME_USUARIO)
         VALUES (?, ?, ?, ?)"); 
         //Chaveamento - Não utilizar array associativo, somente numérico
        
        /*foreach ($array as $key=> $value){
            $query->bindValue($key+1, $value/); 
        }*/ 
        $resultado = $query->execute($array); 
        return $resultado; 
    }
    catch (PDOException $e){
        echo ('Erro na inserção: '.$e->getMessage()); 
    }
}