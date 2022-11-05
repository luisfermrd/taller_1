<?php
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

  //echo diferencia_dias(date('d-m-Y'));
  header('Content-type:application/json;charset=utf-8');

  $numero = $_POST['num_personas'];
  $seguro = $_POST['seguro'];
  $tipo_seguro = $_POST['tipo_seguro'];
  $fecha_inicio = $_POST['fecha_inicio'];
  $fecha_fin = $_POST['fecha_fin'];

  if (diferencia_dias($fecha_inicio) < -1) {
    echo json_encode(array("status"=>-1,"message"=>"La fecha inicial no puede ser menor a la actual")); 
  }else{
    if ($numero < 1) {
        echo json_encode(array("status"=>-1,"message"=>"Debe cotizar por lo menos para 1 persona, vehiculo o vivienda")); 
    }else{
        if(diferencia_dias_dos_fechas($fecha_inicio, $fecha_fin) < 1){
            echo json_encode(array("status"=>-1,"message"=>"La diferencia de la fecha fin con respecto a la inicio, debe ser de por lo menos un dia."));
        }else{
            include("../config/conexion.php");

            $sql="SELECT * FROM cotizar WHERE tipo = '$seguro'";
            $result =mysqli_query($conexion,$sql);

            if($row = mysqli_fetch_array($result)){
                $diferencia_dias = diferencia_dias_dos_fechas($fecha_inicio, $fecha_fin);
                $total = intval($diferencia_dias)*$row["$tipo_seguro"]*$numero;
                echo json_encode(array("status"=>1,"message"=>"Todo bien!", "numero"=>"Número de asegurados: ".$numero, "dias"=>$diferencia_dias." dias (".$fecha_inicio." - ".$fecha_fin.")", "plan" => $tipo_seguro." x ".$numero, "total" => $total));
            }else{
                echo json_encode(array("status"=>-1,"message"=>"Error, algo salio mal"));
            }
        }
    }
  }

?>