<?php
session_start();
require_once "db.php";
$conn = conexion();

//imagen

if(isset($_FILES["file"]["type"]))
{
	$validextensions = array("jpeg", "jpg", "png", "JPG", "PNG");
	$temporary = explode(".", $_FILES["file"]["name"]);
	$file_extension = end($temporary);
	if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
) && ($_FILES["file"]["size"] < 10000000)//Approx. 100kb files can be uploaded.
		&& in_array($file_extension, $validextensions)) {
		if ($_FILES["file"]["error"] > 0)
		{
			echo "Código de Error: " . $_FILES["file"]["error"];
			die('Error');
		}
		else
		{
			if (file_exists("../images/products/" . $_FILES["file"]["name"])) {
				echo 'La imagen ' .$_FILES["file"]["name"] . " ya existe.";
				die('Error');
			}
			else
			{
$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
$targetPath = "../images/products/".$_FILES['file']['name']; // Target path where file is to be stored
$img = mysqli_real_escape_string($conn,$_FILES["file"]["name"]);
$_SESSION['img'] = $img;
move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
echo "Exito";
}
}
}
else
{
	echo "La Imagen que intenta subir es demasiado grande o no es una imagen";
	die('Error');
}

}
else 
{
	//Datos básicos del producto
	$datos = json_decode(file_get_contents('php://input'),true);
	$mensaje ='';
	$queryPro = "INSERT INTO productos (idcategoria,pro_nombre,pro_cantidad,precio,pro_img) values({$datos['pro'][1]},'{$datos['pro'][0]}',{$datos['pro'][2]},{$datos['pro'][3]},'{$_SESSION['img']}');";

	if (mysqli_query($conn,$queryPro) === TRUE) {
		$id_pro = $conn->insert_id;
		$sql = "INSERT INTO pro_x_lote (idlote, idproducto, cantidad) VALUES({$datos['pro'][4]},{$id_pro},{$datos['pro'][2]});";
		if (mysqli_query($conn,$sql) === TRUE) {
			$mensaje .= 'Producto Agregado correctamente </br>';
		}
		else {
			echo $mensaje .= 'ERROR! Existe un problema con el lote! </br>';
			eliminarIMG();
			die('La Operación ha sido cancelada'. mysqli_error($conn));
		}
	} 
	else {
		echo $mensaje .= 'El producto ya existe o hay un ERROR interno! </br>';
		eliminarIMG();
		die('La Operación ha sido cancelada'. mysqli_error($conn));
	}

//Datos de materiales directos
	for ($i=0; $i <count($datos['matD']) ; $i++) {
		$idmaterial = $datos['matD'][$i]['id']; 
		$cantidad = $datos['matD'][$i]['cantidad'];
		$queryMD = "INSERT INTO mat_x_pro (idproducto,idmaterial,cantidad) values({$id_pro},{$idmaterial},{$cantidad});";
		comprobar($queryMD,'materiales Directos');			
	}
//Datos de materiales indirectos
	for ($i=0; $i <count($datos['matI']) ; $i++) {
		$idmaterial = $datos['matI'][$i]['id']; 
		$cantidad = $datos['matI'][$i]['cantidad']; 
		$queryMI = "INSERT INTO mat_x_pro (idproducto,idmaterial,cantidad) values({$id_pro},{$idmaterial},{$cantidad});";
		comprobar($queryMI,'Materiales Indirectos');			
	}
//Datos de mano de obra directa
	for ($i=0; $i <count($datos['obraD']) ; $i++) {
		$horas = $datos['obraD'][$i]['Horas']; 
		$precio = $datos['obraD'][$i]['precio'];
		$descripcion = $datos['obraD'][$i]['Desc'];  
		$queryMOD = "INSERT INTO mo_x_pro (idproducto,horas,precio,descripcion,directa) values({$id_pro},{$horas},{$precio},'{$descripcion}',1);";
		comprobar($queryMOD,'Mano de obra directa');			
	}
//Datos de mano de obra indirecta
	for ($i=0; $i <count($datos['obraI']) ; $i++) {
		$horas = $datos['obraI'][$i]['Horas']; 
		$precio = $datos['obraI'][$i]['precio'];
		$descripcion = $datos['obraI'][$i]['Desc']; 
		$queryMOI = "INSERT INTO mo_x_pro (idproducto,horas,precio,descripcion) values({$id_pro},{$horas},{$precio},'{$descripcion}');";
		comprobar($queryMOI,'Mano de obra indirecta');		
	}
	echo $mensaje;
}

// comprobar si fue insertado en la BD	
function comprobar($query, $tipo){
	global $conn;
	global $mensaje;
	if (mysqli_query($conn,$query) === TRUE) {
		$mensaje .= $tipo.' Agregado correctamente </br>';
	} 
	else {
		eliminarIMG();
		die($mensaje.'</br> ERROR al insertar el '.$tipo. ' La operacion ha sido cancelada');
	}
}

function eliminarIMG(){
	chmod("../images/products/{$_SESSION['img']}", 0777);
	unlink("../images/products/{$_SESSION['img']}");
	$_SESSION['img'] = '';
}

