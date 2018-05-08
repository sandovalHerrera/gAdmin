<?php
//verificar la session del usuario
function verificarSesion(){
    if (isset($_SESSION['usuario'])){
        return true;
    }
    else return false;
}


// parametros seguros
function escape($string)
{
    global $conn;
    return mysqli_real_escape_string($conn, trim($string));
}
// redireccionar
function redirect($location)
{
    header("Location:" . $location);
    exit;
}
function ifItIsMethod($method=null)
{
    if($_SERVER['REQUEST_METHOD'] == strtoupper($method)){
        return true;
    }
    return false;
}

function getCategorias($eliminado = false){
    global $conn;
    if($eliminado) {
        $query = "SELECT idcategorias, cat_nombre FROM categorias WHERE eliminado = 1;";
    }
    else $query = "SELECT idcategorias, cat_nombre FROM categorias WHERE eliminado = 0;";
    $categorias = mysqli_query($conn,$query);
    confirmQuery($categorias);
    while($row = mysqli_fetch_assoc($categorias)) {
        $id = $row['idcategorias'];
        $nombre = $row['cat_nombre'];
        echo "<option value='$id'>{$nombre}</option>";
    }
}

function confirmQuery($query) {
    global $conn;
    if(!$query) {
      die("<h2>Algo salió mal.</h2>" . mysqli_error($conn));
  }
}

function getNumOf($tabla,$campo){
    global $conn;
    $query = "SELECT count({$campo}) as total FROM {$tabla} WHERE eliminado = 0";
    $result = mysqli_query($conn,$query);
    confirmQuery($result);
    while($row = mysqli_fetch_assoc($result)) {
        $total = $row['total'];
    }
    return $total;
}

function getTotalMateriales($directo = true, $idPro){
  global $conn;
  $total = 0;
  $tipo = 0;
  if ($directo) {$tipo = 1;}
  $query = "SELECT P.idproducto, P.pro_nombre, SUM(M.precio * MP.cantidad) as 'total'     
        FROM productos P
        INNER JOIN mat_x_pro MP ON P.idproducto = MP.idproducto
        INNER JOIN materiales M ON M.idmaterial = MP.idmaterial
        WHERE  M.indirecto = {$tipo}
        GROUP BY P.idproducto
        HAVING P.idproducto = {$idPro};";
  $result = mysqli_query($conn,$query);
  confirmQuery($result);
  while($row = mysqli_fetch_assoc($result)) {
      $total = $row['total'];
    }
    return round($total,2);
}

function getTotalManoObra($directo = true, $idPro){
  global $conn;
  $total = 0;
  $tipo = 0;
  if ($directo) {$tipo = 1;}
  $query = "SELECT P.idproducto, P.pro_nombre, SUM(MO.precio * MO.horas) as 'total' 
          FROM productos P
          INNER JOIN mo_x_pro MO ON P.idproducto = MO.idproducto
          WHERE  MO.directa = {$tipo}
          GROUP BY P.idproducto
          HAVING P.idproducto = {$idPro};";
  $result = mysqli_query($conn,$query);
  confirmQuery($result);
  while($row = mysqli_fetch_assoc($result)) {
      $total = $row['total'];
    }
    return round($total,2);
}

function add_user($user,$pass, $tipo){

    global $conn;

    $user = mysqli_real_escape_string($conn, $user);
    $pass   = mysqli_real_escape_string($conn, $pass);
    $tipo = mysqli_real_escape_string($conn, $tipo);

    $pass= password_hash( $pass, PASSWORD_BCRYPT, array('cost' => 12));

    $query = "INSERT INTO usuario (idtipo_u,nombre, contrasena) ";
    $query .= "VALUES('{$tipo}','{$user}', '{$pass}');";
    $add_user = mysqli_query($conn, $query);

    confirmQuery($add_user);
}

function login_user($username, $password)
{

   global $conn;

    $user = trim($username);
    $pass = trim($password);

    $user = mysqli_real_escape_string($conn, $user);
    $pass = mysqli_real_escape_string($conn, $pass);

    $query = "SELECT * FROM usuario WHERE nombre = '{$user}';";
    $buscar_user = mysqli_query($conn, $query);
    if (!$buscar_user) {
       die("QUERY FAILED" . mysqli_error($connection));
    }


   while ($row = mysqli_fetch_array($buscar_user)) {

       $db_id = $row['idusuario'];
       $db_nombre = $row['nombre'];
       $db_pass = $row['contrasena'];
       $db_tipo = $row['idtipo_u'];

       if (password_verify($pass, $db_pass)) {

           $_SESSION['usuario'] = $db_nombre;
           $_SESSION['tipo_u'] = $db_tipo;
           if ($db_tipo == 2) {
               redirect('index.php');
           } elseif ($db_tipo == 3) {
               redirect('/gerente/index.php');
           } elseif ($db_tipo == 4) {
               redirect('empleado/emp_index.php');
           } else redirect("primeraVez.php");
       } else {
            $_SESSION['login'] = 'La contrasena o el usuario ingresado no coinciden!';
            return $_SESSION['login'];
       }
   }
    $_SESSION['login'] = 'EL usuario ingresado no fue encontrado!';
    return $_SESSION['login'];
}

function aggUnidadMedida($nombre, $abreviatura) {
  global $conn;
  $nombre = escape($nombre);
  $abreviatura = escape($abreviatura);

  $query = "INSERT INTO unidad_medida (um_nombre, um_simbolo) values('{$nombre}', '{$abreviatura}');";
  $result = mysqli_query($conn, $query);
  if ($result) {
    return true;
  } else return false;
}