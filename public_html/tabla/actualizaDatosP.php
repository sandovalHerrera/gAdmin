
<?php 
	require_once "../includes/db.php";
	$conexion=conexion();

	$id=$_POST['idproducto'];
	$n=$_POST['pro_nombre'];
	$c=$_POST['pro_cantidad'];
	/*$p=$_POST['precio']; */
	/* $costo=$_POST['costo']; */


	$sql="UPDATE productos set pro_nombre='$n',
								pro_cantidad=$c
				where idproducto=$id";
				
	$result=mysqli_query($conexion,$sql);



 ?>