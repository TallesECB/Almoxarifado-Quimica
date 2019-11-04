<?php
session_start();
include("conecta.php");

$emailadmin = $_REQUEST['emailadmin'];
$senhaadmin = $_REQUEST['senhaadmin'];

if($emailadmin == "admin" && $senhaadmin == 1234)
{
    $_SESSION['admin'] = 'Admin';
    header('location: paineladmin.php');     
} else {    

        $sql = "select * from admins where '$emailadmin' = emailadmin and '$senhaadmin' = senhaadmin ";

        try {	
        	$consulta = $conexao->prepare($sql);
        	$consulta->execute();
            //echo (0);
            $linhas=$consulta->rowCount(); // Assim pega apenas uma linha de cadatro e verifica se esta certo o login
            if($linhas == 1){
                $resultado = $consulta->fetch();
                
                $_SESSION['idadmin'] = $resultado['idadmin'];
                $_SESSION['profissaoadmin'] = $resultado['profissaoadmin'];
                $_SESSION['numeroadmin'] = $resultado['numeroadmin'];
                $_SESSION['enderecoadmin'] = $resultado['enderecoadmin'];
                $_SESSION['emailadmin'] = $resultado['emailadmin'];
                $_SESSION['nomeadmin'] = $resultado['nomeadmin'];
                
                header("Refresh: 0.1;url=paineladmin.php"); 
               
            }else {
                header('location:index.php');   
            }

        }
        catch(PDOException $ex){
            echo($ex->getMessage());
            header('location:index.php');   
        }
    }    

?>

}