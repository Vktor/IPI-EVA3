<?php
ini_set("soap.wsdl_cache", 0);

$nombre= $_POST['nombre'];
$depto= $_POST['depto'];
$sex= $_POST['sx'];
$edad = $_POST['edad'];
$dinero= $_POST['dinero'];

include ('nusoap/lib/nusoap.php');

$cliente = new nusoap_client('http://localhost/IPI-EVA3/webservice.php?wsdl');
$error = $cliente->getError();
        if($error)
        {
                echo '<h2>Constructor Error</h2><pre>'.$err.'</pre>';
        }
$peticion=array('nombre'=>$nombre, 'departamento'=>$depto, 'sexo'=>$sex, 'edad'=>$edad, 'efectivo'=>$dinero);
$result=$cliente->call('agregarCliente', $peticion);
if($cliente->fault)
        {
                echo '<h2>Fault</h2><pre>';
                print_r($result);
                echo '</pre>';
        }
        else
        {
                $error = $cliente->getError();
                if($error)
                {
                        echo '<h2>Error</h2><pre>'.$error.'</pre>';
                }
                else
                {
                        print_r($result);
                }
        }
        echo '<meta http-equiv="REFRESH" content="0,url=index.html">';
?>

