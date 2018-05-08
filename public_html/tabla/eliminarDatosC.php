
<?php 
	require_once "../includes/db.php";
	$conexion=conexion();
	$id=$_POST['id'];

	$sql="UPDATE categorias SET eliminado=1
	 where idcategorias=$id";
	echo $result=mysqli_query($conexion,$sql);

	echo " $id ";
	echo $sql;
	echo $result;
 ?>