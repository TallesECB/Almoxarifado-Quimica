<?php 
require_once('../conecta.php');
require_once('funcoes.php'); /*Funcoes da pasta logica_usuario*/ 

include ('configura_upload.php'); //Arquivo que contém as configurações do UPLOAD 

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

$email = $_POST['email']; 
$nome = $_POST['nome']; 
$senha = $_POST['senha']; 
$idade = $_POST['idade']; 



/*========================================================================================*/
set_time_limit(0); // elimina o limite de tempo de execução do programa
$nome_arquivo = $_FILES['imagem']['name']; //Nome do arquivo como está na máquina do usuário
//$_FILES é um array superglobal 
$tamanho_arquivo = $_FILES['imagem']['size']; //Tamho do arquivo
$nome_temporario = $_FILES['imagem']['tmp_name']; /*Nome temporário que o servidor usa
para armazenar o arquivo*/ 
$tipo = $_FILES['imagem']['type']; 

/*=========================================================================================*/ 
if (!empty ($nome_arquivo)){ //Se não está vazio 
    if ($sobrescrever == false && file_exists("$caminho/$nome_arquivo"))
    die ("Arquivo já existente"); 
}
else {
    die ("Selecione o arquivo a ser enviado"); //Campo está vazio
}



if ($limitar_tamanho== true && $tamanho_arquivo > $tamanho_maximo) {
    die ("Arquivo deve ter tamanho máximo de 800 000 bytes"); 
}

$extensao = strrchr($nome_arquivo, '.'); //strrchr - retorna o pedaço do nome até o ponto
if ($limitar_extensoes == true && !in_array($extensao, $extensoes)) { /*$estensão se refere ao arquivo que estamos 
fazendo upload e $extensoes é o array que contém as extensões válidas*/ 
    die ("Extensão de arquivo inválida"); 
}


if(move_uploaded_file($nome_temporario, "$caminho/$nome_arquivo")){
    // echo json_encode ("Upload realizado com sucesso");
   // echo "upload realizado com sucesso"; 
}
else {
    die ("O arquivo não pode ser movido"); 
}
/*============================================================================================*/ 
$array =  [
    $email, 
    $senha, 
    $idade,
    $nome,
    $nome_arquivo, 
]; 
   //var_dump ($array); 
   //die; 
$retorno = criaContaUser($conexao, $array); 

if($retorno){ //Booleano
    echo "Conta criada com sucesso";
}
else {
    // echo json_encode ('Não foi possível criar a conta'); 
    echo "nao foi possivel criar a conta";
}
