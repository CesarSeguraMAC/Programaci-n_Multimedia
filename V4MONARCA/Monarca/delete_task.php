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

// Obtener los datos de la solicitud
$data = json_decode(file_get_contents('php://input'), true);

// Verificar que el ID del producto fue proporcionado
if (!isset($data['producto_id'])) {
    echo json_encode(['success' => false, 'error' => 'ID de producto no proporcionado']);
    exit();
}

$producto_id = $data['producto_id'];

try {
    // Consulta SQL para eliminar el producto del usuario actual
    $stmt = $conn->prepare("DELETE FROM producto WHERE producto_id = :producto_id ");
    
    // Vincular los parámetros de manera adecuada
    $stmt->bindValue(':producto_id', $producto_id, PDO::PARAM_INT);
    

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Verificar si se eliminó un producto
        if ($stmt->rowCount() > 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'No se encontró el producto o no pertenece al usuario']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Error al eliminar el producto']);
    }

} catch (PDOException $e) {
    // Manejar errores de la base de datos
    http_response_code(500);
    echo json_encode(["error" => "Error en la base de datos: " . $e->getMessage()]);
}
?>
