<?php
include_once('../config/config.php');
?>

<!doctype html>
<html lang="es">

<head>
  <title>Seguros</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo URL?>/public/css/styles.css">

</head>

<body>
  <header>
    <!-- place navbar here -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="principal.php">Seguros</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?php echo URL?>/views/form_vida.php">Seguros de vida</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?php echo URL?>/views/form_vivienda.php">Seguros de vivienda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?php echo URL?>/views/form_vehiculo.php">Seguros de vehiculos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?php echo URL?>/views/mis_seguros.php">Mis seguros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?php echo URL?>/controller/cerrar_sesion.php">Cerrar sesi??n</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>