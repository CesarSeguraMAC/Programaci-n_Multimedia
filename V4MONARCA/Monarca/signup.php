<?php
  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Nuevo usuario creado exitosamente';
    } else {
      $message = 'Lo sentimos, hubo un problema al crear tu cuenta.';
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Registrarse</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="icon" href="Imagenes/monarca.jpeg" type="imagen/png">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background: linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%);
      font-family: 'Roboto', sans-serif;
    }
    .register-container {
      background: #fff;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      width: 90%;
      max-width: 400px;
      text-align: center;
    }
    h1 {
      color: #333;
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
      background-color: #a1c4fd;
      color: #fff;
      border-radius: 5px;
      font-size: 1rem;
      cursor: pointer;
      transition: background 0.3s;
      margin-top: 1rem;
    }
    input[type="submit"]:hover {
      background-color: #89c2f8;
    }
    a {
      color: #a1c4fd;
      text-decoration: none;
      font-weight: bold;
      transition: color 0.3s;
    }
    a:hover {
      color: #89c2f8;
    }
    .message {
      color: green;
      font-weight: bold;
      margin-top: 1rem;
    }
    .error-message {
      color: red;
      font-weight: bold;
      margin-top: 1rem;
    }
  </style>
</head>
<body>
  <div class="register-container">
    <?php require 'partials/header.php' ?>

    <?php if (!empty($message)): ?>
      <p class="<?= strpos($message, 'exitosamente') ? 'message' : 'error-message' ?>">
        <?= htmlspecialchars($message); ?>
      </p>
    <?php endif; ?>

    <h1>Registrarse</h1>
    <span>o <a href="login.php">Iniciar sesión</a></span>

    <form action="signup.php" method="POST">
      <input name="email" type="text" placeholder="Ingresa tu correo electrónico" required>
      <input name="password" type="password" placeholder="Ingresa tu contraseña" required>
      <input name="confirm_password" type="password" placeholder="Confirma tu contraseña" required>
      <input type="submit" value="Enviar">
    </form>
  </div>
</body>
</html>
