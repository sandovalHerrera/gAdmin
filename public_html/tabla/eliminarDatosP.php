
<?php 
	require_once "../includes/db.php";
	$conexion=conexion();
	$id=$_POST['id'];

	$sql="UPDATE productos SET eliminado=1
	 where idproducto=$id";
	echo $result=mysqli_query($conexion,$sql);

	echo " $id ";
	echo $sql;
	echo $result;
 ?>