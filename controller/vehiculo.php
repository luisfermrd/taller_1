<?php
function obtener_edad_segun_fecha($fecha_nacimiento){
  $nacimiento = new DateTime($fecha_nacimiento);
  $ahora = new DateTime(date("Y-m-d"));
  $diferencia = $ahora->diff($nacimiento);
  return $diferencia->format("%y");
}
$cumple_seguro = $_POST['cumple_seguro'];
$uso = $_POST['uso'];
$tipo_vehiculo = $_POST['tipo_vehiculo'];
$otra_marca = $_POST['otra_marca'];
$marca = $_POST['marca'];
if ($otra_marca == "" & $marca == "") {
  $marca = "Debe seleccionar una marca";
  $otra_marca = "O ingrese la marca del auto";
}
if ($marca != "") {
  $otra_marca = "No aplica";
}
$modelo = $_POST['modelo'];
$version = $_POST['version'];
if ($version == "") {
  $version = "No aplica";
}
$motor = $_POST['motor'];
if ($motor == "") {
  $motor = "No aplica";
}
$cv = $_POST['cv'];
if ($cv == "") {
  $cv = "No aplica";
}
$carga = $_POST['carga'];
$matricula = $_POST['matricula'];
if ($matricula == "") {
  $matricula = "No aplica";
}
//Conductor
$nombres = $_POST['nombres'];
$email = $_POST['email'];
$celular = $_POST['celular'];
if(strlen($celular)>10){
  $celular = "El numero de celular no puede tener mas de 10 caracteres";
}
$tipo_documento = $_POST['tipo_documento'];
$num_documento = $_POST['num_documento'];
if(strlen($num_documento)>10){
  $num_documento = "El numero de documento no puede tener mas de 10 caracteres";
}
$fecha_nacimiento = $_POST['fecha_nacimiento'];
if($fecha_nacimiento==""){
  $fecha_nacimiento = "No aplica";
}else if(obtener_edad_segun_fecha($fecha_nacimiento)<18){
  $fecha_nacimiento = "Fecha invalidad, no puedes tener ".obtener_edad_segun_fecha($fecha_nacimiento)." años";
}
$fecha_carnet = $_POST['fecha_carnet'];
if($fecha_carnet==""){
  $fecha_carnet = "No aplica";
}


?>




<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>
  <header>
    <!-- place navbar here -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="../index.html">Seguros</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../pages/form_vida.html">Seguros de vida</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../pages/form_vivienda.html">Seguros de vivienda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../pages/form_vehiculo.html">Seguros de vehiculos</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
  </header>
  <main>

    <div class="container m-sm-5 mt-3 bg-light">
        <div class="row">
            <div class="col ms-3">
                <h1 class="fs-3">Datos del formulario de seguro de vida</h1>
            </div>
            <div class = "container p-4">
              <p>Cuando le cumple el seguro: <?php echo $cumple_seguro ?> </p><br>
              <h2>Datos del vehiculo</h2>
              <p>Uso: <?php echo $uso ?> </p><br>
              <p>Tipo de vehiculo: <?php echo $tipo_vehiculo ?> </p><br>
              <p>Marca: <?php echo $marca ?> </p><br>
              <p>Otra marca: <?php echo $otra_marca ?> </p><br>
              <p>Modelo: <?php echo $modelo ?> </p><br>
              <p>Version: <?php echo $version ?> </p><br>
              <p>Motor: <?php echo $motor ?> </p><br>
              <p>CV: <?php echo $cv ?> </p><br>
              <p>Carga: <?php echo $carga ?> </p><br>
              <p>Matricula: <?php echo $matricula ?> </p><br>
              <h2>Datos del conductor</h2>
              <p>Nombres y apellidos: <?php echo $nombres ?> </p><br>
              <p>Email: <?php echo $email ?> </p><br>
              <p>Celular: <?php echo $celular ?> </p><br>
              <p>Tipo de docuemnto: <?php echo $tipo_documento ?> </p><br>
              <p>Numero de docuemento: <?php echo $num_documento ?> </p><br>
              <p>Fecha de nacimiento: <?php echo $fecha_nacimiento ?> </p><br>
              <p>Fecha de carnet conducir: <?php echo $fecha_carnet ?> </p><br>
            </div>
            <br>
            <br>
            <div class="form-group d-flex justify-content-between">
                <a href="../index.html">
                    <button type="button"  class="btn btn-danger row-3 mt-2"> Regresar a la pagina principal </button>
                </a>
            </div>
        </div>
    </div>

  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>