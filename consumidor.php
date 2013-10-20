<?php
ini_set("soap.wsdl_cache", 0);

try{
$cliente = new soapClient('http://localhost/IPI-EVA3/webservice.php?wsdl');
$result =$cliente->saludo();
echo $result;
}catch(soapFault $error){
	die($error->getMessage());
}


?>