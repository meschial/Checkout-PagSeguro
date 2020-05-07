<?php
include("config.php");

$email = $PAGSEGURO_EMAIL;
$token = $PAGSEGURO_TOKEN;

$Code=filter_input(INPUT_GET,'code',FILTER_SANITIZE_SPECIAL_CHARS);
$Url="https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/refunds?email=".$email."&token=".$token."&transactionCode={$Code}";

$Curl=curl_init($Url);
curl_setopt($Curl,CURLOPT_HTTPHEADER,Array("Content-Type: application/x-www-form-urlencoded; charset=UTF-8"));
curl_setopt($Curl,CURLOPT_POST,true);
curl_setopt($Curl,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($Curl,CURLOPT_RETURNTRANSFER,true);
$Retorno=curl_exec($Curl);
curl_close($Curl);

$Xml=simplexml_load_string($Retorno);
var_dump($Xml);