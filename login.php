<?php
session_start();
include("conecta.php");

$emailuser = $_REQUEST['emailuser'];
$senhauser = $_REQUEST['senhauser'];

if($emailuser == "admin" && $senhauser == 1234)
{
    $_SESSION['admin'] = 'Admin';
    header('location: paineladmin.php');     
} else {    

        $sql = "select * from usuarios where '$emailuser' = emailuser and '$senhauser' = senhauser ";

        try {	
        	$consulta = $conexao->prepare($sql);
        	$consulta->execute();
            //echo (0);
            $linhas=$consulta->rowCount(); // Assim pega apenas uma linha de cadatro e verifica se esta certo o login
            if($linhas == 1){
                $resultado = $consulta->fetch();
                
                $_SESSION['iduser'] = $resultado['iduser'];
                $_SESSION['profissaouser'] = $resultado['profissaouser'];
                $_SESSION['numerouser'] = $resultado['numerouser'];
                $_SESSION['enderecouser'] = $resultado['enderecouser'];
                $_SESSION['emailuser'] = $resultado['emailuser'];
                $_SESSION['nomeuser'] = $resultado['nomeuser'];
                
                header("Refresh: 0.1;url=paineluser.php"); 
               
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