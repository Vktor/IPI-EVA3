<?php
function conectar(){
	$db ="ipi-eva3";
	$enlace = @mysql_pconnect("localhost","root","");
	if (!$enlace) {
			return (FALSE);
		}else{
			return($enlace);
		}
}

?>