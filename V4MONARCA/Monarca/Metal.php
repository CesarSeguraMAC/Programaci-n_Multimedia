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
    <title>Metal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!---Mis archivos css-->
    <link href="archivos_css/estilo_letras_menu.css" rel="stylesheet">
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

 </style>
</head>

        <body>
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
                            <a class="nav-link mx-3 mt-3 texto_menu_nav" href="inicio.php">Inicio</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link mx-3 mt-3 texto_menu_nav" href="Telas.php">Telas</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link mx-3 mt-3 texto_menu_nav" href="Plastico.php">Plastico</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link mx-3 mt-3 texto_menu_nav" href="papel.php">Papel</a>
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
    
    
              <!---Final barra de navegacion-->


              <div class="conteiner text-center mt-5">
    <h1>Productos de Metal Reciclado</h1>
</div>

<div class="conteiner mt-5 mb-5 mx-5">
    <div class="row">

        <!-- Producto 1 -->
        <div class="col-4">
            <div class="card border border-1 border-black" style="width: 18rem">
                <img src="imagenes\metal1.png" class="card-img-top" alt="Lata de metal reciclado">
                <div class="card-body">
                <strong>Descripción del Producto: Acero</strong>

<p><strong>Características:</strong></p>
<p>El acero es un material altamente resistente y duradero, compuesto principalmente de hierro y carbono. Su versatilidad y capacidad para soportar cargas y condiciones extremas lo convierten en una opción popular en construcción, fabricación y otras aplicaciones industriales.</p>

<p><strong>Beneficios:</strong></p>
<ul>
    <li><strong>Resistencia Mecánica:</strong> Ideal para soportar cargas pesadas y condiciones exigentes en proyectos industriales y de construcción.</li>
    <li><strong>Durabilidad:</strong> Su composición lo hace resistente al desgaste y prolonga su vida útil, incluso en condiciones extremas.</li>
    <li><strong>Maleabilidad y Ductilidad:</strong> Permite su transformación en distintas formas y tamaños para adaptarse a diversas aplicaciones.</li>
    <li><strong>Reciclable:</strong> Contribuye a la sostenibilidad, ya que puede ser reciclado y reutilizado en nuevas aplicaciones.</li>
    <li><strong>Resistencia a la Corrosión:</strong> Disponible en versiones con aleaciones para mejorar la resistencia a la oxidación y corrosión.</li>
</ul>

<p><strong>Usos Comunes:</strong></p>
<ul>
    <li>Construcción de edificios, puentes y estructuras.</li>
    <li>Fabricación de maquinaria y equipo industrial.</li>
    <li>Producción de vehículos y piezas automotrices.</li>
    <li>Creación de herramientas y componentes de precisión.</li>
</ul>

<p><strong>Especificaciones:</strong></p>
<ul>
    <li><strong>Composición:</strong> [Especificar tipo de acero y porcentaje de aleaciones]</li>
    <li><strong>Formato:</strong> [Especificar si es en lámina, barra, tubo, etc.]</li>
    <li><strong>Dimensiones:</strong> [Especificar dimensiones y grosores disponibles]</li>
</ul>

<p>Elige el acero para tus proyectos y asegura una construcción resistente y confiable. ¡Haz tu pedido hoy para aprovechar todas sus ventajas!</p>

                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        Precio:<p>15.00</p>
                    </li>
                    <li class="list-group-item">
                        Unidades Disponibles:<p>500</p>
                    </li>
                </ul>
                <div class="card-body">
                <form id="metal1" method="post">
  <button type="submit" class="btn btn-primary" >Añadir al carrito</button>
</form>
                   
                </div>
            </div>
        </div>
        <script>
  // Agregar un evento al formulario para manejar el submit con AJAX
  document.getElementById("metal1").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevenir que el formulario recargue la página

    // Usar Fetch para enviar datos al archivo PHP
    fetch("add_metal1.php", {
      method: "POST", // Usamos POST para enviar datos
      body: new FormData(this) // Enviar los datos del formulario
    })
    .then(response => response.text()) // Procesar la respuesta del servidor
    .then(data => {
      console.log("Respuesta del servidor:", data);
      // Mostrar mensaje emergente
      alert("Producto añadido al carrito"); // Mensaje emergente
    })
    .catch(error => {
      console.error("Error:", error);
    });
  });
</script>

        <!-- Producto 2 -->
        <div class="col-4">
            <div class="card border border-1 border-black" style="width: 18rem;">
                <img src="imagenes\metal2.png" class="card-img-top" alt="Contenedor de metal reciclado">
                <div class="card-body">
                <strong>Descripción del Producto: Cobre</strong>

<p><strong>Características:</strong></p>
<p>El cobre es un metal de alta conductividad eléctrica y térmica, ampliamente utilizado en aplicaciones industriales, eléctricas y de construcción. Su maleabilidad, durabilidad y resistencia a la corrosión lo convierten en un material esencial en diversas industrias.</p>

<p><strong>Beneficios:</strong></p>
<ul>
    <li><strong>Excelente Conductividad Eléctrica:</strong> Ideal para cables y componentes eléctricos por su alta eficiencia en la conducción de electricidad.</li>
    <li><strong>Conductividad Térmica Superior:</strong> Eficaz para aplicaciones que requieren transferencia de calor, como en sistemas de refrigeración y calefacción.</li>
    <li><strong>Maleable y Fácil de Trabajar:</strong> Permite su transformación en diferentes formas, adaptándose a una variedad de aplicaciones.</li>
    <li><strong>Duradero y Resistente a la Corrosión:</strong> Mantiene su calidad y aspecto en diversas condiciones ambientales.</li>
    <li><strong>Reciclable:</strong> Material sustentable que puede reutilizarse sin perder sus propiedades, contribuyendo a la sostenibilidad.</li>
</ul>

<p><strong>Usos Comunes:</strong></p>
<ul>
    <li>Fabricación de cables y componentes eléctricos.</li>
    <li>Sistemas de tuberías y fontanería.</li>
    <li>Componentes en sistemas de calefacción y refrigeración.</li>
    <li>Producción de monedas y objetos decorativos.</li>
    <li>Aplicaciones en industrias de telecomunicaciones y electrónica.</li>
</ul>

<p><strong>Especificaciones:</strong></p>
<ul>
    <li><strong>Pureza:</strong> [Especificar pureza del cobre, e.g., 99.9%]</li>
    <li><strong>Formato:</strong> [Especificar si es en alambre, tubo, lámina, barra, etc.]</li>
    <li><strong>Dimensiones:</strong> [Especificar dimensiones y grosores disponibles]</li>
</ul>

<p>Descubre la versatilidad y eficiencia del cobre en tus proyectos. ¡Haz tu pedido hoy y aprovecha sus excepcionales propiedades!</p>

                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        Precio:<p>200.00</p>
                    </li>
                    <li class="list-group-item">
                        Unidades Disponibles:<p>100</p>
                    </li>
                </ul>
                <div class="card-body">
                <form id="metal2" method="post">
  <button type="submit" class="btn btn-primary" >Añadir al carrito</button>
</form>
                    
                </div>
            </div>
        </div>
        <script>
  // Agregar un evento al formulario para manejar el submit con AJAX
  document.getElementById("metal2").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevenir que el formulario recargue la página

    // Usar Fetch para enviar datos al archivo PHP
    fetch("add_metal2.php", {
      method: "POST", // Usamos POST para enviar datos
      body: new FormData(this) // Enviar los datos del formulario
    })
    .then(response => response.text()) // Procesar la respuesta del servidor
    .then(data => {
      console.log("Respuesta del servidor:", data);
      // Mostrar mensaje emergente
      alert("Producto añadido al carrito"); // Mensaje emergente
    })
    .catch(error => {
      console.error("Error:", error);
    });
  });
</script>


        <!-- Producto 3 -->
        <div class="col-4">
            <div class="card border border-1 border-black" style="width: 18rem;">
                <img src="imagenes\metal3.png" class="card-img-top" alt="Herramientas de metal reciclado">
                <div class="card-body">
                <strong>Descripción del Producto: Aluminio</strong>

<p><strong>Características:</strong></p>
<p>El aluminio es un metal ligero, resistente y versátil, ideal para aplicaciones en construcción, transporte y manufactura. Su resistencia a la corrosión y su excelente relación resistencia-peso lo convierten en un material preferido en diversas industrias.</p>

<p><strong>Beneficios:</strong></p>
<ul>
    <li><strong>Ligero y Fuerte:</strong> Ofrece una alta resistencia sin agregar peso, facilitando el transporte y la manipulación.</li>
    <li><strong>Resistencia a la Corrosión:</strong> Su capa protectora natural lo hace ideal para aplicaciones al aire libre y en condiciones extremas.</li>
    <li><strong>Excelente Conductividad Térmica:</strong> Ideal para aplicaciones en disipación de calor, como en radiadores y componentes electrónicos.</li>
    <li><strong>Fácilmente Moldeable:</strong> Se puede moldear, laminar y cortar en diferentes formas, adaptándose a múltiples aplicaciones.</li>
    <li><strong>100% Reciclable:</strong> Contribuye a la sostenibilidad, ya que puede ser reciclado sin perder sus propiedades.</li>
</ul>

<p><strong>Usos Comunes:</strong></p>
<ul>
    <li>Fabricación de estructuras y componentes en construcción.</li>
    <li>Producción de partes automotrices y aeroespaciales.</li>
    <li>Fabricación de envases y embalajes ligeros y resistentes.</li>
    <li>Componentes electrónicos y disipadores de calor.</li>
    <li>Aplicaciones decorativas y de diseño.</li>
</ul>

<p><strong>Especificaciones:</strong></p>
<ul>
    <li><strong>Pureza:</strong> [Especificar pureza del aluminio, e.g., 99%]</li>
    <li><strong>Formato:</strong> [Especificar si es en lámina, tubo, perfil, barra, etc.]</li>
    <li><strong>Dimensiones:</strong> [Especificar dimensiones y grosores disponibles]</li>
</ul>

<p>Elige el aluminio para tus proyectos y disfruta de su resistencia, ligereza y durabilidad. ¡Haz tu pedido hoy y descubre todas sus aplicaciones!</p>

                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        Precio:<p>350.00</p>
                    </li>
                    <li class="list-group-item">
                        Unidades Disponibles:<p>50</p>
                    </li>
                </ul>
                <div class="card-body">
                <form id="metal3" method="post">
  <button type="submit" class="btn btn-primary" >Añadir al carrito</button>
</form>
                    
                </div>
            </div>
        </div>
        <script>
  // Agregar un evento al formulario para manejar el submit con AJAX
  document.getElementById("metal3").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevenir que el formulario recargue la página

    // Usar Fetch para enviar datos al archivo PHP
    fetch("add_metal3.php", {
      method: "POST", // Usamos POST para enviar datos
      body: new FormData(this) // Enviar los datos del formulario
    })
    .then(response => response.text()) // Procesar la respuesta del servidor
    .then(data => {
      console.log("Respuesta del servidor:", data);
      // Mostrar mensaje emergente
      alert("Producto añadido al carrito"); // Mensaje emergente
    })
    .catch(error => {
      console.error("Error:", error);
    });
  });
</script>

            </div>
        </div>

    </div>
</div>
