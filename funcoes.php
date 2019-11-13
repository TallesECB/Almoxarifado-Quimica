<?php 
//Funções do usuário - ON-LAB 

function login_user ($conexao, $array){
    try {
    $query = $conexao->prepare("select * from usuario where login_usuario=? and senha_usuario=?");
    if($query->execute($array)){
        $usuario = $query->fetch(); 
      if ($usuario)
        {  
            return $usuario;
        }
    else
        {
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

function login_admin($conexao, $array){
    try {
    $query = $conexao->prepare("select * from administrador where login_admin=? and senha_admin=?");
    if($query->execute($array)){
        $administrador = $query->fetch(); 
      if ($administrador)
        {  
            return $administrador;
        }
    else
        {
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





?> 