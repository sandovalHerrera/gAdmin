
//          ACCCIONES
//botones agregar material
var listaMD = [];
var listaMI = [];
var listaOD = [];
var listaOI = [];
var cMO = 0;
var precio = 0;
jQuery("#btnAggMD").click(function(){
	if (validarMaterial(true)) {
		material = jQuery('#ddlPD option:selected').text();
		idmat = jQuery('#ddlPD option:selected').val();
		indexP = jQuery('#ddlPD option:selected').index() -1;
		cant = jQuery('#cantidadD').val();
		mat = {index:indexP,id:idmat, nombre:material,cantidad:cant, um:aMedidasD[indexP]};
		jQuery('#materialesD').append(itemMaterial('MD',idmat, material,cant, mat.um));
		listaMD.push(mat);
		jQuery('#ddlPD option[value='+idmat+']').attr('disabled','disabled');
		limpiar('mat',true);
	} else alertify.error('Llene correctamente los campos');

});

jQuery("#btnAggMI").click(function(){
	if (validarMaterial(false)) {
		material = jQuery('#ddlMI option:selected').text();
		idmat = jQuery('#ddlMI option:selected').val();
		indexP = jQuery('#ddlMI option:selected').index() -1;
		cant = jQuery('#cantidadI').val();
		mat = {index:indexP,id:idmat, nombre:material,cantidad:cant, um:aMedidasI[indexP]};
		jQuery('#materialesI').append(itemMaterial('MI',idmat, material,cant, mat.um));
		listaMI.push(mat);
		jQuery('#ddlMI option[value='+idmat+']').attr('disabled','disabled');
		limpiar('mat',false);
	} else alertify.error('Llene correctamente los campos');
});

jQuery("#btnAggOD").click(function(){
	if (validarManoObra(true)) {
		horas = jQuery('#horasMOD').val();
		precioH = jQuery('#phMOD').val();
		desc = jQuery('#descMOD').val();
		mObra = {Horas:horas, precio:precioH, Desc:desc,id:cMO}; 
		listaOD.push(mObra);
		jQuery('#obraDdiv').append(itemMO('OD',cMO,horas,desc)); cMO++;
		limpiar('mo',true);
	} else alertify.error('Llene correctamente los campos');
});

jQuery("#btnAggOI").click(function(){
	if (validarManoObra(false)) {
		horas = jQuery('#horasMOI').val();
		precioH = jQuery('#phMOI').val();
		desc = jQuery('#descMOI').val();
		mObra = {Horas:horas, precio:precioH, Desc:desc,id:cMO}; 
		listaOI.push(mObra); 
		jQuery('#obraIdiv').append(itemMO('OI',cMO,horas,desc)); cMO++;
		limpiar('mo',false);
	} else alertify.error('Llene correctamente los campos');
});


//              FUNCIONES


jQuery('.colls').click(function(){
	if (jQuery(this).attr('class').includes('btn-secondary')) {
		jQuery(this).removeClass('btn-secondary');
		jQuery(this).addClass('btn-primary');
	} else
	{
		jQuery(this).removeClass('btn-primary');
		jQuery(this).addClass('btn-secondary');
	}
	;
});
// todos los agregar
jQuery('.agg').click(function () {
	 calcularPrecio();
});

// calcular el precio
function calcularPrecio(ganancia = 0){
	if (ganancia >precio) {
		precio = ganancia;
	}else{
		precio = ganancia;
        //materiales
        if (listaMD.length > 0) {
        	for (var i = 0; i< listaMD.length; i++) {
        		precio += listaMD[i].cantidad * aPreciosD[listaMD[i].index];
        	}
        }
        if (listaMI.length > 0) {
        	for (var i = 0; i< listaMI.length; i++) {
        		precio += listaMI[i].cantidad * aPreciosI[listaMI[i].index];
        	}
        }
        //mano de obra
        if (listaOD.length > 0) {
        	for (var i = 0; i< listaOD.length; i++) {
        		precio += listaOD[i].Horas * listaOD[i].precio;
        	}
        }
        if (listaOI.length > 0) {
        	for (var i = 0; i< listaOI.length; i++) {
        		precio += listaOI[i].Horas * listaOI[i].precio;
        	}
        }
	}
        return jQuery('#btnAgg').text('Agregar Producto $' + precio.toFixed(2));
    }


//validacion del producto
function validarPro() {
	if (       jQuery.isNumeric(jQuery('#cantidadP').val()) == false 
			|| jQuery.isNumeric(jQuery('#nombreP').val()) == true
			|| jQuery('#nombreP').val() == ''
			|| jQuery('#imagen').attr('src') == '') {
				return false;
	} else return true;
}

function calcularGanancia() {
	ganancia  =0;
	if (jQuery('#txtG').val() != '' 
		&& jQuery.isNumeric(jQuery('#txtG').val())
		&& precio >0 ) {
		if (jQuery('#ddlGan option:selected').val() == '0'
			&& jQuery('#txtG').val() > 0
			&& jQuery('#txtG').val() <= 100) {
			ganancia = precio*(jQuery('#txtG').val()/100);
			alert(ganancia);
			return calcularPrecio(ganancia);
		} else {
			if (jQuery('#txtG').val() >= precio) {
				ganancia = parseFloat(jQuery('#txtG').val());
				return calcularPrecio(ganancia);
			} alertify.error('Su precio fijo debe ser mayor o igual que el costo del producto');
			
		}
	} else alertify.error('Debe llenar los datos de ganancia correctamente! o el costo debe ser mayor a cero');
	
}

function almenosUnMaterial(){
	sum = listaMD.length + listaMI.length + listaOD.length + listaOI.length;
	if (sum>0) return true;
	else return false;
}

//validacion de materiales
function validarMaterial(directo) {
	if (directo) {
		if (jQuery.isNumeric(jQuery('#cantidadD').val()) == false || jQuery('#ddlPD option:selected').val() == 0 ){
			return false;
		} else return true;
	}
	else
	{
		if (jQuery.isNumeric(jQuery('#cantidadI').val()) == false || jQuery('#ddlMI option:selected').val() == 0  ){
			return false;
		} else return true;
	}
}

//validacion de mano de obra
function validarManoObra(directo) {
	if (directo) {
		if (jQuery.isNumeric(jQuery('#horasMOD').val()) == false
			|| jQuery.isNumeric(jQuery('#phMOD').val()) == false
			|| jQuery('#descMOD').val() == "" ){
			return false;
	} else return true;
}
else
{
	if (jQuery.isNumeric(jQuery('#horasMOI').val()) == false
		|| jQuery.isNumeric(jQuery('#phMOI').val()) == false
		|| jQuery('#descMOI').val() == "" ){
		return false;
} else return true;
}
}

//recalcular el precio y activar de nuevo el select
function recalcular(elemento, tipo){
	var id = elemento.parentNode.getAttribute("id");
            node = document.getElementById(id);
            node.parentNode.removeChild(node);
	if (tipo == 'MD') {
		jQuery('#ddlPD option[value='+id+']').removeAttr('disabled');
		for (var i =0; i< listaMD.length; i++) {
			if (listaMD[i].id == id) {
				listaMD.splice(i,1);
				break;
			}
		}
	}
	if (tipo == 'MI') {
		jQuery('#ddlMI option[value='+id+']').removeAttr('disabled');
		for (var i =0; i< listaMI.length; i++) {
			if (listaMI[i].id == id) {
				listaMI.splice(i,1);
				break;
			}
		}
	}
	if (tipo == 'OD') {
		alert(tipo);
		for (var i =0; i< listaOD.length; i++) {
			if (listaOD[i].id == id) {
				listaOD.splice(i,1);
				break;
			}
		}
	}
	if (tipo == 'OI') {
		for (var i =0; i< listaOI.length; i++) {
			if (listaOI[i].id == id) {
				listaOI.splice(i,1);
				break;
			}
		}
	}
	calcularPrecio();
}


//agregar nodo a listas de materiales y mano de obra
var idOD = 0; var idOI = 0;
function itemMaterial(_tipo,_id, _material, _cantidad, _unidad) {
	campo = '<li id="'+_id+'" class="list-group-item">';
	campo += '<i class="fa fa-flask"></i>  ' + _cantidad + ' ' + _unidad;
	campo += ' de ' + _material;
	campo += '<span style="color:red" onclick="recalcular(this,'+"'" +_tipo+"'" + ');" class="fa fa-cut pull-right">Eliminar</span>';
	campo += '</li>';
	return campo;
}

function itemMO(_tipo,_id, _horas, _desc) {
	campo = '<li id="'+_id+'" class="list-group-item">';
	campo += '<i class="fa fa-flask"></i>  ' + _horas + ' horas de ' + _desc
	campo += '<span style="color:red" onclick="recalcular(this,'+"'" +_tipo+"'" + ');" class="fa fa-cut pull-right">Eliminar</span>';
	campo += '</li>';
	return campo;
}


//limpiar textboxs
function limpiar(tipo, directo){
	if (tipo == 'mat' && directo) {
		jQuery('#cantidadD').val('');
		jQuery('#ddlPD').val(jQuery("#ddlPD option:first").val());;
	}
	if (tipo == 'mat' && !directo) {
		jQuery('#cantidadI').val('');   
		jQuery('#ddlMI').val(jQuery("#ddlMI option:first").val());;
	}
	if (tipo == 'mo' && directo) {
		jQuery('#horasMOD').val('');
		jQuery('#phMOD').val('');
		jQuery('#descMOD').val('');
	}
	if (tipo == 'mo' && !directo) {
		jQuery('#horasMOI').val('');
		jQuery('#phMOI').val('');
		jQuery('#descMOI').val('');
	}
}


// funciones globales
aPreciosD = ''; aPreciosI = '';
aMedidasD = ''; aMedidasI = '';
function getPreciosD(array){
	aPreciosD = array.split(',');
}
function getPreciosI(array){
	aPreciosI = array.split(',');
}
function getMedidasD(array){
	aMedidasD = array.split(',');
}
function getMedidasI(array){
	aMedidasI = array.split(',');
}

function agregar(datosImg){
	if (datosImg == "Exito") {

		apro = [jQuery('#nombreP').val(), jQuery('#categoriaP').val(),
		jQuery('#cantidadP').val(), precio, jQuery('#ddlLotes option:selected').val()];

		json = {pro:apro,matD:listaMD,matI:listaMI,obraD:listaOD,obraI:listaOI};
		datos = JSON.stringify(json);

		var request = jQuery.ajax({
			type:"POST",
			url:"includes/agg_nuevo_pro.php",
			data:datos
		});

		request.done(function( data ) {
			if (data.indexOf('ERROR') == -1) {
				alertify.success(data);
				setTimeout('window.location.reload()',4000);
			} else alertify.error(data);
			
		}); 

		request.fail(function( jqXHR, textStatus ) { 
			alertify.error(textStatus);
		});
	} else alertify.error(datosImg);  
}

jQuery("#fPro").on('submit',(function(e) {
	e.preventDefault();
	if (validarPro() && almenosUnMaterial()) {
		jQuery.ajax({
			url: "includes/agg_nuevo_pro.php", 
			type: "POST",             
			data: new FormData(this), 
			contentType: false,      
			cache: false,             
			processData:false,        
			success: function(data)   
			{
				agregar(data);
			}
		});
	} else alertify.error('Llene los datos del producto correctamente o agregue algún material');
}));