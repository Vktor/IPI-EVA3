<?php	
require_once('nusoap/lib/nusoap.php');
$URL='http://localhost/IPI-EVA3';
$server= new soap_server();
$server->configureWSDL('IPIeva3WS', $URL);
$server->wsdl->schemaTargetNamespace=$URL;



//metodo saludar
$server->register('saludo',array('nombre'=>'xsd:string'), array('return'=>'xsd:string'), $URL);


function saludo(){
	return new soapval('return','xsd:string', 'Hola!, saludos desde el web service');
}
//metodo para registrar cliente en base de datos
$server->register('agregarCliente',array('nombre'=>'xsd:string','departamento'=>'xsd:string','sexo'=>'xsd:string','edad'=>'xsd:int','efectivo'=>'xsd:int'), array('return'=>'xsd:string'), $URL);

function agregarCliente($nombre, $depto, $sex, $edad, $efectivo){
include ('conexion.php');
$query="insert into cliente(nombre, departamento, sexo, edad, efectivo) values('".$nombre."','".$depto."','".$sex."',".intval($edad).",".intval($efectivo).")";
$result=mysql_query($query);
if ($result) {
	return new soapval('return','xsd:string',"DATOS AGREGADOS EXITOSAMENTE");
}
	return new soapval('return','xsd:string',"ERROR AL AGREGAR DATOS");
}

if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
$server->service($HTTP_RAW_POST_DATA);
?>