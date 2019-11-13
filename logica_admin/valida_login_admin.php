<?php 
//=================================ADMINISTRADOR================================================= 
include ('../conecta.php'); 
include ('../funcoes.php'); 

if(isset($_POST['enviar'])){ 


  $login = $_POST['loginadmin']; 
  $senha = $_POST['senhaadmin'];

  
  $array = array($login, $senha);

  $administrador = login_admin($conexao,$array);

  session_start(); //Cade sessão do PHP dura por default 3h

  if($administrador){ 
      $_SESSION['logado'] = true;
      $_SESSION['id'] = $administrador['ID_ADMIN'];
      $_SESSION['nome'] = $administrador['NOME_ADMIN'];
      header('location: ../paineladmin.php'); 
 
  }
  else{
  	   $_SESSION['msg'] = 'Login ou senha inválido(a)'; 
       header('location:../index.php'); 
  }
}

