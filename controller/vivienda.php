<?php
$nombres=$_POST["nombres"];
$tipo_documento=$_POST["tipo_documento"];
$num_documento=$_POST["num_documento"];
if(strlen($num_documento)>10){
    $num_documento = "El numero de documento no puede tener mas de 10 caracteres";
}
$email=$_POST["email"];
$celular=$_POST["celular"];
if(strlen($celular)>10){
    $celular = "El numero de celular no puede tener mas de 10 caracteres";
}
$direccion=$_POST["direccion"];
$ciudad=$_POST["ciudad"];
if (strlen($_POST["aseguradora"])>0) {
    $aseguradora=$_POST["aseguradora"];
}else{
    $aseguradora = "No aplica";
}
$construccion=$_POST["construccion"];
if(strlen($construccion)>2){
    $construccion = "Edificacion muy antigua";
}
$valor=$_POST["valor"];
if (isset($_POST["asegurar"])) {
    $asegurar=$_POST["asegurar"];
}else{
    $asegurar = "No definido";
}
if (isset($_POST["acreedor"])) {
    $acreedor=$_POST["acreedor"];
}else{
    $acreedor = "No definido";
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
                <h1 class="fs-3">Datos del formulario de seguro de vivienda</h1>
            </div>
            <div class = "container p-4">
                <p>Nombre del propietario: <?php echo $nombres ?> </p><br>
                <p>Tipo de docuemnto: <?php echo $tipo_documento ?> </p><br>
                <p>Numero de docuemento: <?php echo $num_documento ?> </p><br>
                <p>Email: <?php echo $email ?></p><br>
                <p>Celular: <?php echo $celular ?></p><br>
                <p>Direccion completa del inmueble: <?php echo $direccion ?></p><br>
                <p>Ciudad/Municipio: <?php echo $ciudad ?></p><br>
                <p>Aseguradora Actual: <?php echo $aseguradora ?></p><br>
                <p>Edad aproximada o años de construcción: <?php echo $construccion ?></p><br>
                <p>Valor del Inmueble en Millones: <?php echo $valor ?></p><br>
                <p>Desea Asegurar contenidos: <?php echo $asegurar ?></p><br>
                <p>Tiene acreedor oneroso/hipoteca/leasing: <?php echo $acreedor ?></p><br>
            </div>
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