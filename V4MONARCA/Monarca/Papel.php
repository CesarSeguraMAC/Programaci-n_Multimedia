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
    <title>Papel</title>
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
                            <a class="nav-link mx-3 mt-3 texto_menu_nav" href="telas.php">Telas</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link mx-3 mt-3 texto_menu_nav" href="plastico.php">Plastico</a>
                        </li>
    
    
                        <li class="nav-item">
                            <a class="nav-link mx-3 mt-3 texto_menu_nav" href="Metal.php">metal</a>
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
    <h1>Productos de Papel Reciclado</h1>
</div>

<div class="conteiner mt-5 mb-5 mx-5">
    <div class="row">

        <!-- Producto 1 -->
        <div class="col-4">
            <div class="card border border-1 border-black" style="width: 18rem">
                <img src="imagenes\papel1.png" class="card-img-top" alt="Cuaderno de papel reciclado">
                <div class="card-body">
                <strong>Descripción del Producto: Cartón Bigris</strong>

<p><strong>Características:</strong></p>
<p>El cartón Bigris es un material de alta resistencia, ideal para proteger productos y utilizar en múltiples aplicaciones de embalaje. Su estructura rígida y duradera proporciona protección efectiva durante el transporte y almacenamiento, asegurando la integridad de los productos.</p>

<p><strong>Beneficios:</strong></p>
<ul>
    <li><strong>Resistencia Superior:</strong> Perfecto para soportar pesos y proteger productos delicados o voluminosos.</li>
    <li><strong>Versátil y Adaptable:</strong> Puede utilizarse como intercalador entre palés, para la fabricación de estuches y en troquelados.</li>
    <li><strong>Protección Eficaz:</strong> Ayuda a prevenir daños en los productos durante el transporte y almacenamiento.</li>
    <li><strong>Diversos Gramajes y Formatos:</strong> Disponible en distintos espesores y tamaños, adecuado para diferentes necesidades de embalaje.</li>
    <li><strong>Reciclable y Ecológico:</strong> Fabricado con materiales reciclados y reciclables, contribuyendo a la sostenibilidad.</li>
</ul>

<p><strong>Usos Comunes:</strong></p>
<ul>
    <li>Intercalado entre palés para proteger productos.</li>
    <li>Fabricación de estuches y cajas personalizadas.</li>
    <li>Aplicaciones de troquelado en empaques a medida.</li>
    <li>Protección de productos durante el transporte y almacenamiento.</li>
</ul>

<p><strong>Especificaciones:</strong></p>
<ul>
    <li><strong>Gramaje:</strong> [Especificar gramaje disponible]</li>
    <li><strong>Dimensiones:</strong> [Especificar dimensiones]</li>
</ul>

<p>Opta por el cartón Bigris para una solución de embalaje resistente y versátil. ¡Haz tu pedido hoy y garantiza la protección de tus productos!</p>

                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        Precio:<p>80.00</p>
                    </li>
                    <li class="list-group-item">
                        Unidades Disponibles:<p>100</p>
                    </li>
                </ul>
                <div class="card-body">
                <form id="papel1" method="post">
  <button type="submit" class="btn btn-primary" >Añadir al carrito</button>
</form>
                    
                </div>
            </div>
        </div>
        <script>
  // Agregar un evento al formulario para manejar el submit con AJAX
  document.getElementById("papel1").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevenir que el formulario recargue la página

    // Usar Fetch para enviar datos al archivo PHP
    fetch("add_papel1.php", {
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
                <img src="imagenes\bo.jpg" class="card-img-top" alt="Bolsa de papel reciclado">
                <div class="card-body">
                <strong>Descripción del Producto: Papel Kraft</strong>

<p><strong>Características:</strong></p>
<p>El papel Kraft, también conocido como papel de estraza o papel madera, es un papel grueso y resistente de color marrón, fabricado sin blanquear para conservar su resistencia natural. Su proceso de fabricación lo convierte en un material de alta durabilidad, ideal para múltiples aplicaciones de envoltura y embalaje.</p>

<p><strong>Beneficios:</strong></p>
<ul>
    <li><strong>Alta Resistencia:</strong> Su fabricación le otorga una gran resistencia al desgarro, tracción y estallido, ideal para proteger productos pesados o voluminosos.</li>
    <li><strong>Versátil:</strong> Utilizable en envolturas, sacos, paquetes y como material de embalaje seguro y duradero.</li>
    <li><strong>Aislante:</strong> Combinado con polietileno o oxiasfalto, se emplea como barrera de vapor en aplicaciones de construcción.</li>
    <li><strong>Ecológico:</strong> Fabricado sin blanquear y 100% reciclable, lo que lo convierte en una opción sostenible y amigable con el medio ambiente.</li>
    <li><strong>Textura Natural y Atractiva:</strong> Su color marrón y textura rústica lo hacen popular para embalajes de aspecto artesanal.</li>
</ul>

<p><strong>Usos Comunes:</strong></p>
<ul>
    <li>Envoltura de productos y paquetes.</li>
    <li>Fabricación de sacos y bolsas resistentes.</li>
    <li>Embalaje y protección de mercancías para envío.</li>
    <li>Producción de fósforos y otros productos artesanales.</li>
    <li>Construcción, en barreras de vapor combinadas con polietileno u oxiasfalto.</li>
</ul>

<p><strong>Especificaciones:</strong></p>
<ul>
    <li><strong>Gramaje:</strong> [Especificar gramaje disponible]</li>
    <li><strong>Dimensiones:</strong> [Especificar dimensiones]</li>
</ul>

<p>Elige el papel Kraft para una solución de embalaje resistente y ecológica. ¡Haz tu pedido hoy y descubre su versatilidad en tus proyectos!</p>

                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        Precio:<p>20.00</p>
                    </li>
                    <li class="list-group-item">
                        Unidades Disponibles:<p>300</p>
                    </li>
                </ul>
                <div class="card-body">
                <form id="papel2" method="post">
  <button type="submit" class="btn btn-primary" >Añadir al carrito</button>
</form>
                   
                </div>
            </div>
        </div>
        <script>
  // Agregar un evento al formulario para manejar el submit con AJAX
  document.getElementById("papel2").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevenir que el formulario recargue la página

    // Usar Fetch para enviar datos al archivo PHP
    fetch("add_papel2.php", {
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
                <img src="imagenes\papel2.png" class="card-img-top" alt="Tarjetas de presentación de papel reciclado">
                <div class="card-body">
                <strong>Descripción del Producto: Papel Testliner</strong>

<p><strong>Características:</strong></p>
<p>El papel Testliner es un material resistente y reciclado, fabricado principalmente con fibra recuperada y, en algunos casos, con un aporte de fibra virgen para mayor durabilidad. Su acabado encolado y su versatilidad lo convierten en una excelente opción para el recubrimiento exterior de cartones corrugados, proporcionando protección y estética en embalajes.</p>

<p><strong>Beneficios:</strong></p>
<ul>
    <li><strong>100% Reciclado:</strong> Fabricado principalmente con fibra recuperada, es una opción sostenible y respetuosa con el medio ambiente.</li>
    <li><strong>Resistente y Duradero:</strong> Su composición ofrece una gran resistencia a golpes y desgastes, ideal para embalajes de alto rendimiento.</li>
    <li><strong>Acabado Encolado:</strong> Proporciona una superficie más resistente y ayuda a proteger contra la humedad en aplicaciones de embalaje.</li>
    <li><strong>Alta Calidad para Exterior:</strong> Perfecto para la capa exterior de cartones corrugados, asegurando una apariencia uniforme y atractiva.</li>
</ul>

<p><strong>Usos Comunes:</strong></p>
<ul>
    <li>Capa exterior en cartón corrugado para embalajes.</li>
    <li>Fabricación de cajas y envases resistentes.</li>
    <li>Protección y recubrimiento en aplicaciones de embalaje industrial.</li>
</ul>

<p><strong>Especificaciones:</strong></p>
<ul>
    <li><strong>Composición:</strong> [Especificar porcentaje de fibra reciclada y fibra virgen]</li>
    <li><strong>Gramaje:</strong> [Especificar gramaje disponible]</li>
    <li><strong>Dimensiones:</strong> [Especificar dimensiones]</li>
</ul>

<p>Asegura la protección y el atractivo de tus productos con el papel Testliner. ¡Solicita tu pedido hoy para obtener un material resistente y sostenible!</p>

                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        Precio:<p>60.00</p>
                    </li>
                    <li class="list-group-item">
                        Unidades Disponibles:<p>200</p>
                    </li>
                </ul>
                <div class="card-body">
                <form id="papel3" method="post">
  <button type="submit" class="btn btn-primary" >Añadir al carrito</button>
</form>
                    
                </div>
            </div>
        </div>
        <script>
  // Agregar un evento al formulario para manejar el submit con AJAX
  document.getElementById("papel3").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevenir que el formulario recargue la página

    // Usar Fetch para enviar datos al archivo PHP
    fetch("add_papel3.php", {
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