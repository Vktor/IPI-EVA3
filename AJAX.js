	function nuevoAjax(){
	var xmlhttp=false;
 	try {
 		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
 	} catch (e) {
 		try {
 			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
 		} catch (E) {
 			xmlhttp = false;
 		}
 	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
 		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}


	function Saludo(){
		
		ajax=nuevoAjax();
		 ajax.open("GET","http://localhost/IPI-EVA3/consumidor.php",true);
		ajax.onreadystatechange = function()
        {
                if (ajax.readyState = 4)
                {
                       document.getElementById('area').value=ajax.responseText;
                       alert('dentro del if');
                }
        }
       
	 	ajax.send();
	}

/*
	function enviarcontenido(nombre, deptop, sexo, edad, dinero){
		if(window.XMLHttpRequest){
			var nombre =document.getElementById("nombre").value;
			var depto =document.getElementById("depto").value;
			var sexo =document.getElementById("sx").value;
			var edad =document.getElementById("edad").value;
			var dinero =document.getElementById("dinero").value;
			ajax2= new XMLHttpRequest()
		}
		ajax2.onreadystatechange=function(){
			if (ajax2.readyState==4) {
				
					ajax2.responseText
				}
			}
		}
		ajax2.open("POST","http://localhost/IPI-EVA2/agregarCliente.php", true);
		ajax2.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax2.send("&nombre="+nombre, "&depto="+depto, "&sexo="+sexo);
	}
	*/
//window.onload= function(){cargarContenido()}
