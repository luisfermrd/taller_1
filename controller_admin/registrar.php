<?php

$tipo_documento = $_POST['tipo_documento'];
$id = $_POST['id'];
$names = $_POST['names'];
$email = $_POST['email'];
$password = $_POST['password'];


if(empty($id) || empty($names) || empty($tipo_documento) || empty($email) || empty($password)){
	echo "Debe llenar todos los campos!";
}else{
    include("../config/conexion.php");

    //INSERT INTO usuarios(id, tipo_documento, names, email, password) VALUES ('','','','','')

    $sql="SELECT * FROM usuarios WHERE email='$email' OR id='$id'";
    $result =mysqli_query($conexion,$sql);

    if(!$row = mysqli_fetch_array($result)){
        $pass = password_hash($password, PASSWORD_DEFAULT, ['cost' => 15]);
        $query1 = "INSERT INTO usuarios(id, tipo_documento, names, email, password, rol) VALUES ('$id','$tipo_documento','$names','$email','$pass', '1')";
        $result1 =mysqli_query($conexion,$query1);

        if($result1){
            echo "Usuario registrado!";
        }else{
            echo "Error al registrar al usuario.";
        }
        
    }else{
        echo  "Ya existe un usuario con estos datos";
    }
}




?>