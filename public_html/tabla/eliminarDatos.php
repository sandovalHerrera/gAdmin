
<?php 
	require_once "../includes/db.php";
	$conexion=conexion();
	$id=$_POST['id'];

	$sql="UPDATE materiales SET eliminado=1 where idmaterial=$id";
	echo $result=mysqli_query($conexion,$sql);

	echo " $id ";
	echo $sql;
	echo $result;
 ?>