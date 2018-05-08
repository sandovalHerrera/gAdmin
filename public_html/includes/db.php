<?php
//server base de datos
$db['db_host'] = "localhost";
$db['db_user'] = "id5140985_g_root";
$db['db_pass'] = "pi2018ga";
$db['db_name'] = "id5140985_gadmin_db";

//localhost base de datos
// $db['db_host'] = "localhost";
// $db['db_user'] = "root";
// $db['db_pass'] = "jr2020";
// $db['db_name'] = "gadmin_db";

foreach($db as $key => $value){
    define(strtoupper($key), $value);
}

$conn = mysqli_connect(DB_HOST, DB_USER,DB_PASS,DB_NAME);

if (!$conn){
    echo "<h2> Cant connect to database </h2>";
}

function conexion(){ 


$conn = mysqli_connect(DB_HOST, DB_USER,DB_PASS,DB_NAME);

if (!$conn){
    echo "<h2> Cant connect to database </h2>";
    }
return $conn;
}