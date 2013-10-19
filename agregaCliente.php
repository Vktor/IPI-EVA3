<?php
ini_set("soap.wsdl_cache", 0);
/*$nombre= $_POST['nombre'];
$depto= $_POST['depto'];
$sex= $_POST['sexo'];
$edad = $_POST['edad'];
$dinero= $_POST['dinero'];
*/
$nombre= 'Juan';
$depto= 'Ahuachapan';
$sex= 'M';
$edad = '20';
$dinero= '5';

try{
$cliente = new soapClient('http://localhost/IPI-EVA3/webservice.php?wsdl');
$algo=$cliente->agregarCliente(array('nombre'=>$nombre, 'departamento'=>$depto, 'sexo'=>$sex, 'edad'=>$edad, 'dinero'=>$dinero));

}catch(soapFault $error){
	die($error->getMessage());
}