<?php
ini_set("soap.wsdl_cache", 0);
/*$nombre= $_POST['nombre'];
$depto= $_POST['depto'];
$sex= $_POST['sexo'];
$edad = $_POST['edad'];
$dinero= $_POST['dinero'];
*/

try{
$cliente = new SoapClient('http://localhost/IPI-EVA3/webservice.php?wsdl');

$result=$cliente->agregarCliente(array('nombre'=>'Pedro', 'departamento'=>'Ahuachapan', 'sexo'=>'M', 'edad'=>22, 'efectivo'=>30));
 print_r($result);
}catch(soapFault $error){
	die($error->getMessage());
}