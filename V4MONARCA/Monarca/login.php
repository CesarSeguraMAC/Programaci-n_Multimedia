<?php
  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: inicio.php');
    exit;
  }

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    if ($results && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: inicio.php");
      exit;
    } else {
      $message = 'Lo sentimos, esas credenciales no coinciden';
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Iniciar sesión</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
      font-family: 'Roboto', sans-serif;
    }
    .login-container {
      background: #fff;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      width: 90%;
      max-width: 400px;
      text-align: center;
    }
    h1 {
      color: #555;
      margin-bottom: 1.5rem;
    }
    form {
      display: flex;
      flex-direction: column;
    }
    input[type="text"], input[type="password"] {
      padding: 0.8rem;
      margin: 0.5rem 0;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 1rem;
    }
    input[type="submit"] {
      padding: 0.8rem;
      border: none;
      background-color: #fda085;
      color: #fff;
      border-radius: 5px;
      font-size: 1rem;
      cursor: pointer;
      transition: background 0.3s;
      margin-top: 1rem;
    }
    input[type="submit"]:hover {
      background-color: #f6d365;
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
    .message {
      color: red;
      font-weight: bold;
      margin-top: 1rem;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <?php require 'partials/header.php' ?>

    <?php if (!empty($message)): ?>
      <p class="message"><?= htmlspecialchars($message); ?></p>
    <?php endif; ?>
    <link rel="icon" href="Imagenes/monarca.jpeg" type="imagen/png">
    <h1>Iniciar sesión</h1>
    <span>o <a href="signup.php">Regístrate</a></span>

    <form action="login.php" method="POST">
      <input name="email" type="text" placeholder="Ingresa tu correo electrónico" required>
      <input name="password" type="password" placeholder="Ingresa tu contraseña" required>
      <input type="submit" value="Enviar">
    </form>
  </div>
</body>
</html>
