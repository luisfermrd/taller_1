<?php
header('Content-type:application/json;charset=utf-8');

$email = $_POST['email'];
$password = $_POST['password'];


if(empty($email) || empty($password)){
	echo "Debe llenar todos los campos!";
}else{
    include("../config/conexion.php");

    //INSERT INTO usuarios(id, tipo_documento, names, email, password) VALUES ('','','','','')
    

    $sql="SELECT * FROM usuarios WHERE email='$email'";
    $result =mysqli_query($conexion,$sql);

    if($row = mysqli_fetch_array($result)){
        if (password_verify($password, $row['password'])) {
            if($row['active'] == 1){
                session_start();
                $_SESSION['id']=$row['id'];
                $_SESSION['tipo_documento']=$row['tipo_documento'];
                $_SESSION['email']=$row['email'];
                $_SESSION['names']=$row['names'];
                $_SESSION['rol']=$row['rol'];
                if($row['rol'] == 0){
                    //Usuario
                    echo json_encode(array("status"=>1,"rol"=>0,"message"=>"Acceso conseguido")); 
                }else{
                    //Admin
                    echo json_encode(array("status"=>1,"rol"=>1,"message"=>"Acceso conseguido")); 
                }
            }else{
                echo json_encode(array("status"=>-1,"message"=>"Usuario desactivado por el administrador, pongase en contacto con nosotros.")); 
            }
            
        }else{
            echo json_encode(array("status"=>-1,"message"=>"Usuario/contraseña incorrectos!"));
        }
        
    }else{
        echo json_encode(array("status"=>-1,"message"=>"Usuario/contraseña incorrectos!")); 
    }
}




?>