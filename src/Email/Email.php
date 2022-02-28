<?php

namespace OizumiJunho\Email;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/*
$dados = array(
    "emailDestinatario" => "email@email.com.br",
    "nomeDestinatario" => "Nome",
    "emailListaCopiaOculta" => ["email@email.com.br", "email@email.com.br", "email@email.com.br", "email@email.com.br"],
    "msgAssuntoHtml" => "Mensagem Assunto",
    "msgCorpo" => "Corpo da mensagem",
    "msgAssuntoNormal" => "Mensagem Assunto",
    "emailListaAnexo"=>[]
);
*/

class Email
{
    public static function ExeEmail($dados)
    {
        $mail = new PHPMailer(true);

        try {

            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;   

            $mail->isSMTP();
            $mail->SMTPAuth   = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

            $mail->Host       = EmailHost;
            $mail->Username   = EmailUsername;
            $mail->Password   = EmailPassword;
            $mail->Port       = EmailPort;

            $mail->setFrom(EmailRemetenteEmail, EmailRemetenteNome);
            $mail->addAddress($dados['emailDestinatario'], $dados['nomeDestinatario']);

            if (!empty($dados['emailListaCopiaOculta'])) {

                foreach ($dados['emailListaCopiaOculta'] as $resEmailListaCopiaOculta) {
                    $mail->addCC($resEmailListaCopiaOculta);
                }
            }

            if (!empty($dados['emailListaAnexo'])) {

                foreach ($dados['emailListaAnexo'] as $resEmailListaAnexo) {
                    $mail->addAttachment($resEmailListaAnexo);
                }
            }

            $mail->isHTML(true);

            $mail->Subject = $dados['msgAssuntoHtml'];
            $mail->Body    =  $dados['msgCorpo'];
            $mail->AltBody = $dados['msgAssuntoNormal'];

            $mail->send();

            return 'deu certo';
        } catch (Exception $e) {
            return 'deu erro';
        }
    }
}