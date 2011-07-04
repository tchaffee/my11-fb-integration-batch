<?php

$client = new SoapClient('http://ws2.silentworld.tv/Service.asmx?WSDL');

print_r($client);

$result = $client->GetPDumpService(array(
		'identifier' => 'PR11',
		'Method' => '20',
		'username' => 'my11',
		'password' => 'premier',
		'param' => '0',
		'aff' => 0
));

print_r($result);

$resultObj = $result->GetPDumpServiceResult->Results->WServiceResultItemLarge;

print_r($resultObj);

$gameID = $resultObj->Col1;
$prodName = $resultObj->Col2;
$curWeek = $resultObj->Col3;
$prevWeek = $resultObj->Col4;
$curMonth = $resultObj->Col5;
$prevMonth = $resultObj->Col6;
$userName = $resultObj->Col7;
$pass = $resultObj->Col8;

// Get weekly scores.


$weekScores = $client->GetPDumpService(array(
		'identifier' => $gameID,
		'Method' => '21',
		'username' => $userName,
		'password' => $pass,
		'param' => '0',
		'aff' => 0
));


print_r($weekScores);

// Get monthly scores.


$monthScores = $client->GetPDumpService(array(
		'identifier' => $gameID,
		'Method' => '22',
		'username' => $userName,
		'password' => $pass,
		'param' => '0',
		'aff' => 0
));

print_r($monthScores);




?>