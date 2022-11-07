<?php

$id = $_GET['id'];


if(empty($id)){
    echo json_encode(array("status"=>-1,"message"=>"Error, no se recibio la referencia"));
}else{
    include("../config/conexion.php");

    $sql="UPDATE usuarios SET active='0' WHERE id = '$id'";
    $result =mysqli_query($conexion,$sql);

    if($result){
        echo json_encode(array("status"=>1,"message"=>"El ususario con el id: ".$id.", se ha desactivado!"));
    }else{
        echo json_encode(array("status"=>-1,"message"=>"Error, algo salio mal"));
    }
}




?>