//ribosomatic.com

function objetoAjax(){
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


//ELIMINAR USUARIO
function Activar_Usuario(id,accion){
	//donde se mostrará el formulario con los datos
		divInicio = document.getElementById('registro');
		ajax=objetoAjax();
		if(confirm('Seguro que desea activar el Usuario...')){
		//uso del medotod GET
		//indicamos el archivo que realizará el proceso de eliminación
		//junto con un valor que representa el id del empleado
		ajax.open("POST", "Operaciones_Admin.php");
		ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				//mostrar resultados en esta capa
				divInicio.innerHTML = ajax.responseText
				//ActualizarMsj();
			}
		}
		
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores
	ajax.send("id="+id+"&accion="+accion)
	
	}else{
	return false;
	}
}

function Eliminar_Usuario(id,accion){
	//donde se mostrará el formulario con los datos
		divInicio = document.getElementById('registro');
		ajax=objetoAjax();
		if(confirm('Seguro que desea eliminar el registro...')){
		//uso del medotod GET
		//indicamos el archivo que realizará el proceso de eliminación
		//junto con un valor que representa el id del empleado
		ajax.open("POST", "Operaciones_Admin.php");
		ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				//mostrar resultados en esta capa
				divInicio.innerHTML = ajax.responseText
				//ActualizarMsj();
			}
		}
		
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores
	ajax.send("id="+id+"&accion="+accion)
	
	}else{
	return false;
	}
}


function buscar_reporte(cedula,categoria_examen,fecha_desde, fecha_hasta){
	//alert(ID);
	//donde se mostrará el formulario con los datos
		divInicio = document.getElementById('rep');
		ajax=objetoAjax();
		//uso del medotod GET
		//indicamos el archivo que realizará el proceso de eliminación
		//junto con un valor que representa el id del empleado
		ajax.open("POST", "Detalle_nomina.php");
		ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				//mostrar resultados en esta capa
				divInicio.innerHTML = ajax.responseText
				//ActualizarMsj();
			}
		}
		
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores
	ajax.send("cedula="+cedula+"&categoria_examen="+categoria_examen+"&fecha_desde="+fecha_desde+"&fecha_hasta="+fecha_hasta)
}

function Eliminar_Solicitud(id,accion){
	//donde se mostrará el formulario con los datos
		divInicio = document.getElementById('registro');
		ajax=objetoAjax();
		if(confirm('Seguro que desea Eliminar la Solicitud...')){
		//uso del medotod GET
		//indicamos el archivo que realizará el proceso de eliminación
		//junto con un valor que representa el id del empleado
		ajax.open("POST", "Operaciones_Admin.php");
		ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				//mostrar resultados en esta capa
				divInicio.innerHTML = ajax.responseText
				//ActualizarMsj();
			}
		}
		
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores
	ajax.send("id="+id+"&accion="+accion)
	
	}else{
	return false;
	}
}

function Entregar_Solicitud(id,accion){
	//donde se mostrará el formulario con los datos
		divInicio = document.getElementById('registro');
		ajax=objetoAjax();
		if(confirm('Seguro que desea dar cambiar estatus del Examen?...')){
		//uso del medotod GET
		//indicamos el archivo que realizará el proceso de eliminación
		//junto con un valor que representa el id del empleado
		ajax.open("POST", "Operaciones_Admin.php");
		ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				//mostrar resultados en esta capa
				divInicio.innerHTML = ajax.responseText
				//ActualizarMsj();
			}
		}
		
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores
	ajax.send("id="+id+"&accion="+accion)
	
	}else{
	return false;
	}
}


function Aprobar_Solicitud(id,accion){
	//donde se mostrará el formulario con los datos
		divInicio = document.getElementById('registro');
		ajax=objetoAjax();
		if(confirm('Seguro que desea Aprobar la Solicitud...')){
		//uso del medotod GET
		//indicamos el archivo que realizará el proceso de eliminación
		//junto con un valor que representa el id del empleado
		ajax.open("POST", "Operaciones_Admin.php");
		ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				//mostrar resultados en esta capa
				divInicio.innerHTML = ajax.responseText
				//ActualizarMsj();
			}
		}
		
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores
	ajax.send("id="+id+"&accion="+accion)
	
	}else{
	return false;
	}
}