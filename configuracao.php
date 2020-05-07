<?php

//Necessário testar em dominio com SSL
define("URL", "https://localhost/celke/");

$sandbox = true;
if ($sandbox) {
    //Credenciais do SandBox
    define("EMAIL_PAGSEGURO", "formatacaoumuarama@gmail.com");
    define("TOKEN_PAGSEGURO", "1045640749614566A06AA642AD42B89E");
    define("URL_PAGSEGURO", "https://ws.sandbox.pagseguro.uol.com.br/v2/");
    define("SCRIPT_PAGSEGURO", "https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js");
    define("EMAIL_LOJA", "E-mail de suporte pós venda");
    define("MOEDA_PAGAMENTO", "BRL");
    define("URL_NOTIFICACAO", "https://sualoja.com.br/notifica.html");
} else {
    //Credenciais do PagSeguro
    define("EMAIL_PAGSEGURO", "Seu e-mail do PagSeguro");
    define("TOKEN_PAGSEGURO", "Seu token no PagSeguro");
    define("URL_PAGSEGURO", "https://ws.pagseguro.uol.com.br/v2/");
    define("SCRIPT_PAGSEGURO", "https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js");
    define("EMAIL_LOJA", "E-mail de suporte pós venda");
    define("MOEDA_PAGAMENTO", "BRL");
    define("URL_NOTIFICACAO", "https://sualoja.com.br/notifica.html");
}

//Config SANDBOX or PRODUCTION environment
$SANDBOX_ENVIRONMENT = true;

$PAGSEGURO_API_URL = 'https://ws.pagseguro.uol.com.br/v2';
if($SANDBOX_ENVIRONMENT){
  $PAGSEGURO_API_URL = 'https://ws.sandbox.pagseguro.uol.com.br/v2';
}

$PAGSEGURO_EMAIL = 'formatacaoumuarama@gmail.com';
$PAGSEGURO_TOKEN = '1045640749614566A06AA642AD42B89E';