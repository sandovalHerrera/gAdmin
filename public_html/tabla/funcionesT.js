function agregaformP(datos){
	d=datos.split('||');
	$('#idproducto').val(d[0]);
	$('#nombreP').val(d[4]);
	$('#cantidadP').val(d[5]);
	$('#precioP').val(d[6]);
	$('#costoP').val(d[6]);

/*	$('#precioM').val(d[3]); */
	
}

function agregaform(datos){

	d=datos.split('||');

	$('#idmaterial').val(d[0]);
	$('#nombreM').val(d[1]);
	$('#cantidadM').val(d[2]);
	$('#precioM').val(d[3]);
	
}


function agregaformC(datos){

	d=datos.split('||');

	$('#idcategoria').val(d[0]);
	$('#nombreC').val(d[1]);
	
}




function actualizaDatos(){


	id=$('#idmaterial').val();
	nombre=$('#nombreM').val();
	cant=$('#cantidadM').val();
	precio=$('#precioM').val();



	cadena= "idmaterial="+id +
	        "&mat_nombre=" + nombre + 
			"&cantidad=" + cant +
			"&precio=" + precio;
/*alert(cadena); */

	$.ajax({
		type:"POST",
		url:"tabla/actualizaDatos.php",
		data:cadena,
		success:function(r){
			alertify.success("actualizado con exito!");
 			window.location.reload(); 
			}
		
	});

}


function actualizaDatosP(){


	id=$('#idproducto').val();
	nombre=$('#nombreP').val();
	cant=$('#cantidadP').val();
	precio=$('#precioP').val();



	cadena= "idproducto="+id +
	        "&pro_nombre=" + nombre + 
			"&pro_cantidad=" + cant;
/*alert(cadena); */

	$.ajax({
		type:"POST",
		url:"tabla/actualizaDatosP.php",
		data:cadena,
		success:function(r){
			alertify.success("actualizado con exito!");
 window.location.reload(); 


			}
		
	});

}

function actualizaDatosC(){


	id=$('#idcategoria').val();
	nombre=$('#nombreC').val();




	cadena= "idcategorias="+id +
	        "&cat_nombre=" + nombre;
/*alert(cadena); */

	$.ajax({
		type:"POST",
		url:"tabla/actualizaDatosC.php",
		data:cadena,
		success:function(r){
			alertify.success("actualizado con exito!");
 window.location.reload(); 


			}
		
	});

}


function eliminarDatos(id){


	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"tabla/eliminarDatos.php",
			data:cadena,
			success:function(r){
					alertify.success("Eliminado con exito!");

 window.location.reload(); 

			}
		});
}

function eliminarDatosP(id){

	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"tabla/eliminarDatosP.php",
			data:cadena,
			success:function(r){
					alertify.success("Eliminado con exito!");

 window.location.reload(); 

			}
		});
}

function eliminarDatosC(id){

	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"tabla/eliminarDatosC.php",
			data:cadena,
			success:function(r){
					alertify.success("Eliminado con exito!");

 window.location.reload(); 

			}
		});
}

function preguntarSiNo(id){

		alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDatos(id) }
                , function(){ alertify.error('Acción canceleda!')});
}

function preguntarSiNoP(id){

		alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDatosP(id) }
                , function(){ alertify.error('Acción cancelada!')});
}

function preguntarSiNoC(id){

		alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDatosC(id) }
                , function(){ alertify.error('Acción cancelada!')});
}
