<?php
include("config.php");

$email = $PAGSEGURO_EMAIL;
$token = $PAGSEGURO_TOKEN;

$Code=filter_input(INPUT_GET,'code',FILTER_SANITIZE_SPECIAL_CHARS);
$Url="https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/{$Code}?email=".$email."&token=".$token."";

$Curl=curl_init($Url);
curl_setopt($Curl,CURLOPT_SSL_VERIFYPEER,true);
curl_setopt($Curl,CURLOPT_RETURNTRANSFER,true);
$Retorno=curl_exec($Curl);
curl_close($Curl);
$Xml=simplexml_load_string($Retorno);

echo $Xml->sender->name.'';
echo "Nessa transação você comprou os seguintes produtos:";
foreach ($Xml->items as $Item) {
foreach ($Item as $Itens) {
echo "Descrição: ".$Itens->description.'<br>';
echo "Quantidade: ".$Itens->quantity.'<br>';
echo "Valor: ".$Itens->amount.'<br>';
}
}