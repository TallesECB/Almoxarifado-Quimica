<?php
//identificação para a chamada da classe

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;  

require_once('PHPMailer/src/PHPMailer.php');
require_once('PHPMailer/src/Exception.php');
require_once('PHPMailer/src/SMTP.php');    

$json = file_get_contents('php://input');
$data = json_decode($json);

$nome        = $data->nome;    
$email     = "teduardo13@Hotmail.com";
$emailres    = $data->emailres;     
$conteudo    = $data->conteudo;

$mail = new PHPMailer();
$mail->SetLanguage("br");
$mail->IsSMTP();
$mail->isHTML(true);
$mail->SMTPDebug = 0; //exibe erros e mensagens, 0 não exibe nada
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";

$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->Username = "animalsivet@gmail.com";
$mail->Password = "@1234567j";
$mail->CharSet = "utf-8";

$mail->From = "animalsivet@gmail.com"; //remetente
$mail->FromName = "OnLab";
// Endereço de destino do email
$mail->AddAddress($email); 

// Endereço para resposta

$mail->addReplyTo($emailres);

// Assunto e Corpo do email

$mail->Subject = "Teste de SMTP";

$mail->Body = $conteudo . "<br> E-mail SMTP enviado com sucesso para " . $email . " Enviado por: ".$emailres ;

// var_dump($mail);

$vetore = array();
if(!$mail->Send()){
    // $message = $mail->ErrorInfo;
    // echo(json_encode(['success' => false, 'message' => $message]));
    $vetore['success']=false;
    echo json_encode($vetore); 
} else {
    // echo(json_encode(['success' => true, 'message' => 'Seu contato foi enviado com sucesso!']));
    $vetore['success']=true;
    echo json_encode($vetore); 
}

// else echo(json_encode(['success' => false, 'message' => 'Erro ao enviar sua mensagem, tente novamente!']));

?>