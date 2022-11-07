<?php
session_start();
header('Content-type:application/json;charset=utf-8');

function obtener_edad_segun_fecha($fecha_nacimiento){
  $nacimiento = new DateTime($fecha_nacimiento);
  $ahora = new DateTime(date("Y-m-d"));
  $diferencia = $ahora->diff($nacimiento);
  return $diferencia->format("%y");
}

function diferencia_dias($fecha_ini){
  $ini = new DateTime($fecha_ini);
  $ahora = new DateTime(date("Y-m-d"));
  $diferencia = $ahora->diff($ini);
  return $diferencia->format("%R%a");
}

function diferencia_dias_dos_fechas($fecha_ini , $fecha_fin){
  $ini = new DateTime($fecha_ini);
  $fin = new DateTime($fecha_fin);
  $diferencia = $ini->diff($fin);
  return $diferencia->format("%R%a");
}

$nombres = $_POST['nombres'];
$tipo_documento = $_POST['tipo_documento'];
$num_documento = $_POST['num_documento'];
if(strlen($num_documento)>10){
  echo json_encode(array("status"=>-1,"message"=>"El numero de documento no puede tener mas de 10 caracteres"));
}else{
  $fecha_nacimiento = $_POST['fecha_nacimiento'];
  if (obtener_edad_segun_fecha($fecha_nacimiento)<18) {
    echo json_encode(array("status"=>-1,"message"=>"Fecha invalidad, no puedes tener ".obtener_edad_segun_fecha($fecha_nacimiento)." años"));
  }else{
    $sexo = $_POST['sexo'];
    $estado_civil = $_POST['estado_civil'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    if(strlen($celular)>10){
      echo json_encode(array("status"=>-1,"message"=>"El numero de celular no puede tener mas de 10 caracteres"));
    }else{
      $direccion = $_POST['direccion'];
      $ciudad = $_POST['ciudad'];
      $ingreso = $_POST['ingreso'];
      $profesion = $_POST['profesion'];
      $medicamento = $_POST['medicamento'];
      if ($medicamento == "Si") {
        $cual = $_POST['cual'];
      }else{
        $cual = "No aplica";
      }
  
      $eps_ips = $_POST['eps_ips'];
      $fecha_inicio = $_POST['fecha_inicio'];
      if (diferencia_dias($fecha_inicio) < -1) {
        echo json_encode(array("status"=>-1,"message"=>"La fecha inicial no puede ser menor a la actual")); 
      }else{
        $fecha_fin = $_POST['fecha_fin'];
        $tipo_seguro = $_POST['tipo_seguro'];
        if(diferencia_dias_dos_fechas($fecha_inicio, $fecha_fin) < 1){
          echo json_encode(array("status"=>-1,"message"=>"La diferencia de la fecha fin con respecto a la inicio, debe ser de por lo menos un dia."));
        }else{
          include("../config/conexion.php");

          $sql="SELECT * FROM cotizar WHERE tipo = 'vida'";
          $result =mysqli_query($conexion,$sql);

          if($row = mysqli_fetch_array($result)){
              $diferencia_dias = diferencia_dias_dos_fechas($fecha_inicio, $fecha_fin);
              $total = intval($diferencia_dias)*$row["$tipo_seguro"];
              $ref_pago = random_int(10000000,2147483647);
              $id = $_SESSION['id'];

              $query = "INSERT INTO clientes(id, tipo_documento, names, email) VALUES ('$num_documento','$tipo_documento','$nombres','$email')";

              $query2 = "INSERT INTO vida(id_user, id_beneficiario, fecha_nacimineto, sexo, estado_civil, celular, direccion, ciudad, ingresos, profesion, medicamento, cual, eps_ips, fecha_inicio, fecha_fin, ref_pago, tipo, plan) VALUES ('$id','$num_documento','$fecha_nacimiento','$sexo','$estado_civil','$celular','$direccion','$ciudad','$ingreso','$profesion','$medicamento','$cual','$eps_ips','$fecha_inicio','$fecha_fin','$ref_pago', 'Seguro de vida', '$tipo_seguro')";

              $query3 = "INSERT INTO pagos(ref_pago, valor) VALUES ('$ref_pago','$total')";

              $result =mysqli_query($conexion,$query);
              $result2 =mysqli_query($conexion,$query2);
              $result3 =mysqli_query($conexion,$query3);

              if ($result && $result2 && $result3) {
                echo json_encode(array("status"=>1,"message"=>"Se realizo el registro! ref de pago: ".$ref_pago." --- valor a pagar: ".$total, "ref_pago"=>$ref_pago));
              }else{
                echo json_encode(array("status"=>-1,"message"=>"Error, algo salio mal"));
              }
          }else{
              echo json_encode(array("status"=>-1,"message"=>"Error, algo salio mal"));
          }
        }
      }
    }
  }
  
}


?>