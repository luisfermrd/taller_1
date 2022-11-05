<?php
include_once('config.php');
$conexion = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD,DB_NAME) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");
?>