<?php
session_start();
include 'database.php';

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    // Si el usuario no ha iniciado sesión, redirigir al inicio de sesión
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

try {
    // Consulta SQL para obtener todas las tareas del usuario actual
    $stmt = $conn->prepare("SELECT * FROM producto WHERE id = :id");
    $stmt->bindValue(':id', $user_id, PDO::PARAM_INT);
    $stmt->execute();

    $producto = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Si no hay resultados, devolver un mensaje vacío
    if (empty($producto)) {
        $producto[] = ["mensaje" => "No se encontraron productos"];
    }

    // Devolver los datos en formato JSON
    header('Content-Type: application/json');
    echo json_encode($producto);
} catch (PDOException $e) {
    // Manejar errores de la base de datos
    http_response_code(500);
    echo json_encode(["error" => "Error en la base de datos: " . $e->getMessage()]);
}

?>
