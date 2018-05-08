
<?php 
	require_once "../includes/db.php";
	$conexion=conexion();

	$id=$_POST['idmaterial'];
	$n=$_POST['mat_nombre'];
	$c=$_POST['cantidad'];
	$p=$_POST['precio'];


	$sql="UPDATE materiales set mat_nombre='$n',
								cantidad=$c,
								precio=$p 
				where idmaterial=$id";
				
	$result=mysqli_query($conexion,$sql);



 ?>