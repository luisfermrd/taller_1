<?php
session_start();
header('Content-type:application/json;charset=utf-8');

$patron_nombre= "/^[a-zA-ZÀ-ÿ\s]{3,40}$/";
$patron_numTarjeta= '/^(?:4\d([\- ])?\d{6}\1\d{5}|(?:4\d{3}|5[1-5]\d{2}|6011 )([\- ])?\d{4}\2\d{4}\2\d{4})$/';
$patron_fecha= "/^\d{2}\/\d{2}$/";
$patron_cvv= "/^[0-9]{3}$/";
$patron_direccion= "/^.{6,40}$/";
$patron_id= "/^[0-9]{5,10}$/";

$tarjeta = $_POST['tarjeta'];
$fecha = $_POST['fecha'];
$cvv = $_POST['cvv'];
$nombres = $_POST['nombres'];
$direccion = $_POST['direccion'];
$identificacion = $_POST['identificacion'];
$ref_pago = $_POST['ref_pago'];

if (preg_match($patron_numTarjeta, $tarjeta)) {
    if (preg_match($patron_fecha, $fecha)) {
        if (preg_match($patron_cvv, $cvv)) {
            if (preg_match($patron_nombre, $nombres)) {
                if (preg_match($patron_direccion, $direccion)) {
                    if (preg_match($patron_id, $identificacion)) {
                        include("../config/conexion.php");
                        $sql = "UPDATE pagos SET pago='1',activo='1' WHERE ref_pago = '$ref_pago'";
                        $result =mysqli_query($conexion,$sql);

                        if ($result) {
                            echo json_encode(array("status"=>1,"message"=>"Pago registrado con exito!"));
                        }else{
                            echo json_encode(array("status"=>-1,"message"=>"Error, algo salio mal"));
                        }
                    }else{
                        echo json_encode(array("status"=>-1,"message"=>"La Identificacion no es valida.")); 
                    }
                }else{
                    echo json_encode(array("status"=>-1,"message"=>"La direccion no es valida.")); 
                }
            }else{
                echo json_encode(array("status"=>-1,"message"=>"El nombre de usuario tiene que ser de 3 a 40 dígitos y solo puede contener letras.")); 
            }
        }else{
            echo json_encode(array("status"=>-1,"message"=>"Codigo CVV incorrecto.")); 
        }
    }else{
        echo json_encode(array("status"=>-1,"message"=>"La fecha es invalida.")); 
    }
}else{
    echo json_encode(array("status"=>-1,"message"=>"El numero de tarjeta no es permitido, solo se permiten guiones y numeros.")); 
}
?>