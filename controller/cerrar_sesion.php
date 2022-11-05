<?php
//Empezamos la sesión
session_start();
//Limpiamos las variables de sesión
session_unset();
//Destruìmos la sesión
session_destroy();
//Redireccionamos al login
header("Location: ../index.html");
?>