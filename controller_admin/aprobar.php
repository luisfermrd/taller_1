<?php

$ref_pago = $_GET['ref'];


if(empty($ref_pago)){
    echo json_encode(array("status"=>-1,"message"=>"Error, no se recibio la referencia"));
}else{
    include("../config/conexion.php");

    $sql="UPDATE pagos SET reclamado='2' WHERE ref_pago = '$ref_pago'";
    $sq2="UPDATE solicitudes SET estado='1' WHERE ref_pago = '$ref_pago'";
    $result =mysqli_query($conexion,$sql);
    $result2 =mysqli_query($conexion,$sq2);

    if($result && $result2){
        echo json_encode(array("status"=>1,"message"=>"El seguro con referencia: ".$ref_pago." se ha cancelado!"));
    }else{
        echo json_encode(array("status"=>-1,"message"=>"Error, algo salio mal"));
    }
}




?>