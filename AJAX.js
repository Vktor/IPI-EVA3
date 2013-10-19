	function cargarContenido(){
		var contenedor = document.getElementById('AjaxUser');
		ajax=nuevoAjax();
		ajax.open("GET", "http://localhost/IPI-EVA2/Mostrar.php",true);
		ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				contenedor.innerHTML = ajax.responseText
			}
		}
	 	ajax.send(null)
	}


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