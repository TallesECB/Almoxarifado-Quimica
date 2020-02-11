<?php 
//USUÁRIO 
include ('../conecta.php'); 
include ('../funcoes.php'); 

if(isset($_POST['entrar'])){ 

  $login = $_POST['login'];  
  $senha = $_POST['senha'];
  
  $array = array($login, $senha);
  $usuario = login_user($conexao,$array);
  session_start(); //Cade sessão do PHP dura por default 3h

  if($usuario){ 
      $_SESSION['logado'] = true;
      $_SESSION['id'] = $usuario['ID_USER'];
      $_SESSION['nome'] = $usuario['NOME_USUARIO'];
      $_SESSION['profissao'] = $usuario['PROFISSAO_USUARIO']; 
      $_SESSION['idade'] = $usuario['IDADE_USUARIO']; 
      $_SESSION['email'] = $usuario['EMAIL_USUARIO']; 
      $_SESSION['endereco'] = $usuario['END_USUARIO']; 

      header('location: ../paineluser.php'); 
 
  }
  else{
  	   $_SESSION['msg'] = 'Usuário ou senha inválido(a)'; 
       header('location:../index.php'); 
  }
}

