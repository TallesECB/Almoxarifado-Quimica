<?php 
function loginAdmin($conexao, $array){
 
    try {
        $query = $conexao->prepare("select * from administrador where LOGIN_ADMIN = ? and SENHA_ADMIN = ?");
      
        if($query->execute($array)){
            
            $admin = $query->fetch(); //coloca os dados num array $admin
           
          if ($admin){   
              
                return $admin;
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