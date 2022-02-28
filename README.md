# Objetivo
Criado para facilitar o envio de e-mail

# Requisitos
PHP: Versão 7 ou acima | oizumi-junho/email-php: Qualquer versão | phpmailer/phpmailer: Qualquer versão

# Configuração do arquivo composer.json

```

    "require": {
        "oizumi-junho/email-php": "dev-master",
        "phpmailer/phpmailer": "*.*.*",
        "php": ">=7.0"
    }

```

# Configuração do arquivo config.php

```

<?php

define("EmailHost", "email-ssl.com.br");
define("EmailUsername", "email@email.com.br");
define("EmailPassword", "senha");
define("EmailPort", 465);

define("EmailRemetenteEmail", "email@email.com.br");
define("EmailRemetenteNome", "Nome");

```

# Exemplo de uso

```

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

```