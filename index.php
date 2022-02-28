<?php

require __DIR__ . "/vendor/autoload.php";

use OizumiJunho\Email\Email;

$dados = array(
    "emailDestinatario" => "email@email.com.br",
    "nomeDestinatario" => "Nome",
    "emailListaCopiaOculta" => ["email@email.com.br", "email@email.com.br", "email@email.com.br", "email@email.com.br"],
    "msgAssuntoHtml" => "Mensagem Assunto",
    "msgCorpo" => "Corpo da mensagem",
    "msgAssuntoNormal" => "Mensagem Assunto",
    "emailListaAnexo"=>[]
);

var_dump(Email::ExeEmail($dados));
