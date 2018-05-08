<?php
ob_start();
session_start();

include  "includes/db.php";
include  "functions.php";

if (isset($_SESSION['login'])) {
    $alerta = $_SESSION['login'];
    $_SESSION['login'] = null;
}

if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    login_user($user, $pass);

    // if ( $res == 0){
    //     header('Location:' . 'index.php');
    // }
    // else if ($res == 1) {
    //     #mostrar mensaje que no existe el usuario en un pop up
    //     header('Location:' . 'empleado/emp_index.php');
    // }
    // else {
    //     echo '<h1>Datos Incorrectos</h1>';
    // }
}
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login - G-ADMIN</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="#">
                        <img class="align-content" src="images/Gadmin.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label>Usuario</label>
                            <input name="user" type="text" class="form-control" placeholder="Usuario">
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input name="pass" type="password" class="form-control" placeholder="Contraseña">
                        </div>
                        <button name="submit" type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Entrar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
    mensaje = '<?php echo $alerta; ?>';
    if (mensaje != '') {
        alert(mensaje);
    }
    </script>


</body>
</html>
