<?php
session_start();
header('Content-type:application/json;charset=utf-8');


$ref_pago = $_POST['ref_pago'];
$pdfFile = $_FILES['archivo']['name'];
$tmp_dir = $_FILES['archivo']['tmp_name'];
$pdfSize = $_FILES['archivo']['size'];

if (!empty($ref_pago) && !empty($pdfFile)) {
    $upload_dir = '../archivos/';

    $pdfExt = strtolower(pathinfo($pdfFile,PATHINFO_EXTENSION));

    $valid_extensions = array('pdf');

    $userpic = $ref_pago.".".$pdfExt;
    if(in_array($pdfExt, $valid_extensions)){
        if($pdfSize < 1000000){
            move_uploaded_file($tmp_dir,$upload_dir.$userpic);

            include("../config/conexion.php");
            $sql = "UPDATE pagos SET reclamado='1' WHERE ref_pago = '$ref_pago'";
            $result =mysqli_query($conexion,$sql);
            $sql2 = "INSERT INTO solicitudes(ref_pago) VALUES ('$ref_pago')";
            $result2 =mysqli_query($conexion,$sql2);

            if ($result && $result2) {
                echo json_encode(array("status"=>1,"message"=>"Su solicitud esta siendo procesada! en pocos dias un acesor se contactara con usted"));
            }else{
                echo json_encode(array("status"=>-1,"message"=>"Error, algo salio mal"));
            }
        }else{
            echo json_encode(array("status"=>-1,"message"=>"Error, su pdf es muy grande"));
        }
    }else{
        echo json_encode(array("status"=>-1,"message"=>"Error, el documento no es un pdf"));
    }
}else{
    echo json_encode(array("status"=>-1,"message"=>"Error, no se recibio el archivo")); 
}
?>