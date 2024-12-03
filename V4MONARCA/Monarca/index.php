<?php
  session_start();
  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $user = $results ? $results : null;
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Bienvenido Monarca</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="icon" href="Imagenes/monarca.jpeg" type="imagen/png">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
      color: #333;
    }
    .container {
      background: #fff;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      text-align: center;
      width: 90%;
      max-width: 400px;
    }
    h1 {
      margin-bottom: 1rem;
      color: #555;
    }
    a {
      color: #fda085;
      text-decoration: none;
      font-weight: bold;
      transition: color 0.3s;
    }
    a:hover {
      color: #f6d365;
    }
    .welcome-message {
      margin-bottom: 1.5rem;
      font-size: 1.1rem;
    }
    .btn-container {
      margin-top: 1.5rem;
    }
    .btn {
      display: inline-block;
      padding: 0.8rem 1.5rem;
      margin: 0.3rem;
      border-radius: 5px;
      background: #fda085;
      color: #fff;
      text-decoration: none;
      font-weight: bold;
      transition: background 0.3s;
    }
    .btn:hover {
      background: #f6d365;
    }
  </style>
</head>
<body>
  <div class="container">
    <?php require 'partials/header.php' ?>

    <?php if (!empty($user)): ?>
      <div class="welcome-message">
        <p>Bienvenido, <strong><?= htmlspecialchars($user['email']); ?></strong></p>
        <p>Has iniciado sesión correctamente.</p>
      </div>
      <div class="btn-container">
        <a href="logout.php" class="btn">Cerrar sesión</a>
      </div>
    <?php else: ?>
      <h1>Por favor, inicia sesión o regístrate</h1>
      <div class="btn-container">
        <a href="login.php" class="btn">Iniciar sesión</a>
        <a href="signup.php" class="btn">Registrarse</a>
      </div>
    <?php endif; ?>
    <div class="btn-container">
      <a href="inicio.html" class="btn">Ingresar como invitado</a>
      
      </div>
  </div>
</body>
</html>
