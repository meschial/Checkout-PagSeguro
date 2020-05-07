<?php
require_once('utils.php');
include './configuracao.php';

$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$params = array(
'email'                     => $PAGSEGURO_EMAIL,
'token'                     => $PAGSEGURO_TOKEN,
'paymentMode'               => 'default',
'paymentMethod'             => 'creditCard',
'receiverEmail'             => $PAGSEGURO_EMAIL,
'currency'                  => 'BRL',
//'extraAmount' => '1.00',
'itemId1'                   => $Dados['itemId1'],
'itemDescription1'          => $Dados['itemDescription1'],
'itemAmount1'               => $Dados['itemAmount1'],
'itemQuantity1'             => $Dados['itemQuantity1'],
'notificationURL'           => 'https://melevaprojeto.tk/notificacao.php',
'reference'                 => $Dados['reference'],
'senderName'                => $Dados['senderName'],
'senderCPF'                 => $Dados['senderCPF'],
'senderAreaCode'            => $Dados['senderAreaCode'],
'senderPhone'               => $Dados['senderPhone'],
'senderEmail'               => 'nome@sandbox.pagseguro.com.br',
'senderHash'                => $Dados['hashCartao'],
'shippingAddressStreet'     => $Dados['shippingAddressStreet'],
'shippingAddressNumber'     => $Dados['shippingAddressNumber'],
'shippingAddressComplement' => $Dados['shippingAddressComplement'],
'shippingAddressDistrict'   => $Dados['shippingAddressDistrict'],
'shippingAddressPostalCode' => $Dados['shippingAddressPostalCode'],
'shippingAddressCity'       => $Dados['shippingAddressCity'],
'shippingAddressState'      => $Dados['shippingAddressState'],
'shippingAddressCountry'    => 'BRA',
'shippingType'              => $Dados['shippingType'],
'shippingCost'              => $Dados['shippingCost'],
'creditCardToken'           => $Dados['tokenCartao'],
'installmentQuantity'       => $Dados['qntParcelas'],
'installmentValue'          => $Dados['valorParcelas'],
'noInterestInstallmentQuantity'=> $Dados['noIntInstalQuantity'],
'creditCardHolderName'      => $Dados['creditCardHolderName'],
'creditCardHolderCPF'       => $Dados['creditCardHolderCPF'],
'creditCardHolderBirthDate' => $Dados['creditCardHolderBirthDate'],
'creditCardHolderAreaCode'  => $Dados['senderAreaCode'],
'creditCardHolderPhone'     => $Dados['senderPhone'],
'billingAddressStreet'      => $Dados['billingAddressStreet'],
'billingAddressNumber'      => $Dados['billingAddressNumber'],
'billingAddressComplement'  => $Dados['billingAddressComplement'],
'billingAddressDistrict'    => $Dados['billingAddressDistrict'],
'billingAddressPostalCode'  => $Dados['billingAddressPostalCode'],
'billingAddressCity'        => $Dados['billingAddressCity'],
'billingAddressState'       => $Dados['billingAddressState'],
'billingAddressCountry'     => 'BRA'
);
$header = array('Content-Type' => 'application/json; charset=UTF-8;');
$response = curlExec($PAGSEGURO_API_URL."/transactions", $params, $header);
$xml = simplexml_load_string($response);

$retorna = ['erro' => true, 'dados' => $xml];
header('Content-Type: application/json');
echo json_encode($retorna);
