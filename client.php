<?php

//require("Service.php");
$config = array(
	"soap_version"=> SOAP_1_2,
	"encoding"=> "UTF-8",
	"trace"=> true,
	"exceptions"=> false,
	"user_agent"=> "soap-clientDB-V0.1",
	"cache_wsdl"=> WSDL_CACHE_NONE,
	"compression"=> SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP
	);
$client = new SoapClient("http://localhost/soap_cw12/server.php?wsdl", $config);

//$service = new Service();
var_dump($client->getWord());
var_dump($client->addWord("server"));
var_dump($client->addWord("titi"));
var_dump($client->getWord());
var_dump($client->updateWord("aa","bb"));
var_dump($client->updateWord("server","titi"));
var_dump($client->updateWord("titi","tata"));
var_dump($client->getWord());
var_dump($client->deleteWord("tata"));
var_dump($client->deleteWord("aa"));
var_dump($client->getWord());

echo "==================================REQUEST SAOP =============================<br/>";
echo str_replace("&gt;&lt;", "&gt;<br/>&lt;", htmlentities($client->__getLastRequest()));
var_dump($client->__getLastResponseHeaders());

echo "==================================REQUEST SAOP =============================<br/>";
echo str_replace("&gt;&lt;", "&gt;<br/>&lt;", htmlentities($client->__getLastRequest()));
var_dump($client->__getLastResponseHeaders());