<?php
session_start();
include 'database.php';

header('Content-Type: application/json');

// Verificar si la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos de la solicitud
    $data = json_decode(file_get_contents('php://input'), true);

    // Verificar que los datos necesarios fueron proporcionados
    if (!isset($data['producto_id'], $data['nombre'], $data['consi'], $data['fecha'], $data['fragi'], $data['category'])) {
        echo json_encode(array("success" => false, "error" => "Datos incompletos."));
        exit();
    }

    $producto_id = $data['producto_id'];
    $nombre = $data['nombre'];
    $consi = $data['consi'];
    $fecha = $data['fecha'];
    $fragi = $data['fragi'];
    $category = $data['category'];

    // Verificar si el usuario ha iniciado sesión
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(array("success" => false, "error" => "Usuario no autenticado."));
        exit();
    }

    $user_id = $_SESSION['user_id'];

    // Validar formato de entrada
    if (!is_numeric($producto_id)) {
        echo json_encode(array("success" => false, "error" => "ID del producto no válido."));
        exit();
    }

    if (!strtotime($fecha)) {
        echo json_encode(array("success" => false, "error" => "Fecha no válida."));
        exit();
    }

    try {
        // Consulta ajustada para actualizar solo el producto correspondiente
        $stmt = $conn->prepare("
            UPDATE producto 
            SET nombre = :nombre, consi = :consi, fecha = :fecha, fragi = :fragi, category = :category 
            WHERE producto_id = :producto_id AND id = :user_id
        ");
        

        // Asignar valores a los parámetros
        $stmt->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindValue(':consi', $consi, PDO::PARAM_STR);
        $stmt->bindValue(':fecha', $fecha, PDO::PARAM_STR);
        $stmt->bindValue(':fragi', $fragi, PDO::PARAM_INT);
        $stmt->bindValue(':category', $category, PDO::PARAM_STR);
        $stmt->bindValue(':producto_id', $producto_id, PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);

        // Ejecutar consulta
        if ($stmt->execute()) {
            echo json_encode(array("success" => true));
        } else {
            $errorInfo = $stmt->errorInfo();
            echo json_encode(array("success" => false, "error" => "Error al actualizar el producto: " . $errorInfo[2]));
        }
    } catch (PDOException $e) {
        echo json_encode(array("success" => false, "error" => "Error en la base de datos: " . $e->getMessage()));
    }
} else {
    echo json_encode(array("success" => false, "error" => "Método de solicitud no permitido."));
}
?>
