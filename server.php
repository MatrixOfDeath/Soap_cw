<?php

require_once("Service.php");
require_once("Zend/Loader/Autoloader.php");

$autoloader = Zend_Loader_Autoloader::getInstance();
if(isset($_GET["wsdl"])){
	$wsdl = new Zend_Soap_AutoDiscover();
	$wsdl->setUri("http://localhost/soap_cw12/server.php");
	$wsdl->setClass("Service");
	$wsdl->handle();
}else{
	$server = new SoapServer("http://localhost/soap_cw12/server.php?wsdl");
	$server->setClass("Service");
	$server->handle();

}