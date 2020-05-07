<?php
include("config.php");

$email = $PAGSEGURO_EMAIL;
$token = $PAGSEGURO_TOKEN;

$referencia=filter_input(INPUT_POST,'referencia',FILTER_SANITIZE_SPECIAL_CHARS);
$Url="https://ws.sandbox.pagseguro.uol.com.br/v2/transactions?email=".$email."&token=".$token."&reference={$referencia}";

$Curl=curl_init($Url);
curl_setopt($Curl,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($Curl,CURLOPT_RETURNTRANSFER,true);
$Retorno=curl_exec($Curl);
curl_close($Curl);
$Xml=simplexml_load_string($Retorno);

foreach($Xml->transactions as $Transactions){
  foreach($Transactions as $Transaction){
    echo "
    <a >$Transaction->code</a>
    <a href='pesquisaAvancada.php?code={$Transaction->code}'>Pesquisa avançada</a>
    <a href='cancelar.php?code={$Transaction->code}'>Cancelar comprar</a>            
    <a href='estornar.php?code={$Transaction->code}'>Estornar comprar</a><br>           
        ";
  }
}