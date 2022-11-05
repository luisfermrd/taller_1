<?php

$ref_pago = $_GET['ref'];


if(empty($ref_pago)){
    echo json_encode(array("status"=>-1,"message"=>"Error, no se recibio la referencia"));
}else{
    include("../config/conexion.php");

    $sql="UPDATE pagos SET cancelado='1' WHERE ref_pago = '$ref_pago'";
    $result =mysqli_query($conexion,$sql);

    if($result){
        echo json_encode(array("status"=>1,"message"=>"El seguro con referencia: ".$ref_pago." se ha cancelado!"));
    }else{
        echo json_encode(array("status"=>-1,"message"=>"Error, algo salio mal"));
    }
}




?>