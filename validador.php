<?php 
  //Validar login do On-lab 
  session_start(); 
  
  if (!isset($_SESSION['logado'])) { //Não foi feito login 
    $_SESSION['msg'] = 'Você precisa estar logado'; 
    
    header ('location:index.php'); 
  }  
  

?>