<?php
session_start();
require 'database.php';

// Verifica si el usuario está logueado
if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT email FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $user = null;

    if (count($results) > 0) {
        $user = $results;
    }
} else {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO</title>
    <link href="archivos_css/estilo_letras_menu.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 <!---Mis archivos css-->
    <link href="archivos_css/estilo_letras_menu.css" rel="stylesheet">
    <link rel="icon" href="Imagenes/monarca.jpeg" type="imagen/png">
    <link rel="icon" href="Imagenes/monarca.jpeg" type="imagen/png">
 <style>
    body{
        background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
    }
    nav {
    background: linear-gradient(135deg, #126cfe 0%, #c2e9fb 100%);
}

nav .nav-link {
    color: green; 
}

.conteiner{
position: relative;
top: 800px;

}

 </style>
 
</head>

    <body class="color_body">
            <!---Inicio barra de navegacion-->
            <nav class="navbar navbar-expand-md nav_color">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#">Monarca</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                    
    
                    <!---Inicio lista de elementos-->
                    <ul class="navbar-nav ms-auto">
    
                        <li class="nav-item">
                            <a class="nav-link mx-3 mt-3 texto_menu_nav" href="Telas.php">Telas</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link mx-3 mt-3 texto_menu_nav" href="Plastico.php">Plastico</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link mx-3 mt-3 texto_menu_nav" href="Papel.php">Papel</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link mx-3 mt-3 texto_menu_nav" href="Metal.php">Metal</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link mx-3 mt-3 texto_menu_nav" href="informacion.html">Informacion</a>
                        </li>
    
                        
    
                        <ul class="navbar-nav ms-auto">
    <?php if (!empty($user)): ?>
        <li class="nav-item">
            <span class="nav-link mx-3 texto_menu_nav">Bienvenido, <?= $user['email']; ?></span>
        </li>
        <li class="nav-item">
            <a class="nav-link mx-3 texto_menu_nav" href="logout.php">Cerrar sesión</a>
        </li>
    <?php else: ?>
        <li class="nav-item">
            <a class="nav-link mx-3 texto_menu_nav" href="login.php">Iniciar sesión</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mx-3 texto_menu_nav" href="signup.php">Registrarse</a>
        </li>
    <?php endif; ?>
</ul>

    

<li class="nav-item">
    <a class="nav-link texto_menu_nav" href="producto.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-handbag" viewBox="0 0 16 16">
            <path d="M8 1a2 2 0 0 1 2 2v2H6V3a2 2 0 0 1 2-2m3 4V3a3 3 0 1 0-6 0v2H3.36a1.5 1.5 0 0 0-1.483 1.277L.85 13.13A2.5 2.5 0 0 0 3.322 16h9.355a2.5 2.5 0 0 0 2.473-2.87l-1.028-6.853A1.5 1.5 0 0 0 12.64 5zm-1 1v1.5a.5.5 0 0 0 1 0V6h1.639a.5.5 0 0 1 .494.426l1.028 6.851A1.5 1.5 0 0 1 12.678 15H3.322a1.5 1.5 0 0 1-1.483-1.723l1.028-6.851A.5.5 0 0 1 3.36 6H5v1.5a.5.5 0 1 0 1 0V6z"/>
        </svg>
    </a>
</li>

    
    
                    </ul>
    
                    <!---Final lista elementos-->
    
                  </div>
                </div>
              </nav>
    
    
              <!---Final barra de navegacion-->|
    
        <!---Inicio de carrucel-->
<div class="container mt-5">
            <h1 class="text-center mb-5">Monarca Corporation</h1>
        <!---Inicio carrucel-->

       
              
            <div class="carousel-item active">
                <img src="imagenes/monarca.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5></h5>
                    <p></p>
                </div>
            </div>
         <!---final de carrucel-->  
        </div>
    </div>      
         
  <!---Final seccion inferior-->

    <div class="conteiner mt-5 mb-5 mx-5">
        <div class="row">
              <div class="col-6" style="text-align: center;">
                  <h4>PAGOS SEGUROS</h4>
                  <img src="imagenes/pie_de_pagina/pagos-seguros.webp">
              </div>

              <div class="col-6" style="text-align: center;">
                  <h4>TRANSACCIONES SEGURAS | ENVIOS SEGUROS</h4>
                  <img src="imagenes/pie_de_pagina/transacciones_seguras_mx.webp">
              </div>
          </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>