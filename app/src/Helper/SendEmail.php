<?php


namespace Ifnc\Tads\Helper;


use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/autoload.php';
use Symfony\Component\Yaml\Yaml;
        

class SendEmail
{
    public static function send($email){
        $mail = new PHPMailer(true);
        
        $config = Yaml::parseFile('../config/configEmail.yaml');
    
        
        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = $config['host'];                       // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = $config['email'];          // SMTP username
            $mail->Password   = $config['senha'];
            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = $config['port'];                                    // TCP port to connect to
            
            $mail->CharSet = 'UTF-8';
            $mail->isHTML(true);
            //Recipients
            $mail->setFrom($config['email'], $config['nome']);
            $mail->addAddress($email->emailDestino, $email->nome);     // quem vai receber o email
            // Content     // Set phpmailer format to HTML
            $mail->Subject = $email->titulo;
            $mail->Body    = $email->conteudo;
            $mail->send();
            return 0;
        } catch (Exception $e) {
            return 1;
        }
    }
}