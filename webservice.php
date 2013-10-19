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

function agregarCliente($nombre, $depto, $sex, $edad, $dinero){
include './conexion.php';
$link=conectar();
mysql_select_db("ipi-eva3",$link);
$query="insert into cliente(nombre, departamento, sexo, edad, efectivo) values('".$nombre."','".$departamento."','".$sexo."','".$edad."','".$efectivo."')";
if ($result=mysql_query($query, $link)) {
	return new soapval('return'.'xsd:string',"DATOS AGREGADOS EXITOSAMENTE");
}else{

	return new soapval('return'.'xsd:string',"ERROR AL AGREGAR DATOS");
	}
}
//agregando una tercer funcion buscar por nombre
$server->register('BuscarPorNombre', array('nombre'=>'xsd:string'), array('return'=>'xsd:string'), $URL);
function BuscarPorNombre($nombre){
include './conexion.php';
$link=conectar();
mysql_select_db("ipi-eva3",$link);
$query="Select * from cliente where nombre ='".$nombre."')";
$result=mysql_query($query, $link);
while($f=mysql_fetch_row($result)){
$busca=$f[0];
}

while($f=mysql_fetch_row($result)){
$busca1=$f[1];
}

while($f=mysql_fetch_row($result)){
$busca2=$f[2];
}

while($f=mysql_fetch_row($result)){
$busca3=$f[3];
}

while($f=mysql_fetch_row($result)){
$busca4=$f[4];
}
$concatenar=$busca." ".$busca1." ".$busca2." ".$busca3." ".$busca4;
return new soapval('return','xsd:string', $concatenar);
}
if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
$server->service($HTTP_RAW_POST_DATA);
?>