<?php
include 'database.php';
require 'database.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $consi = $_POST['consi'];
    $fecha = $_POST['fecha'];
    $priority = $_POST['fragi'];
    $category = $_POST['category']; // Captura el valor de la categoría

    // Verificar si el usuario está autenticado
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id']; // Cambiar a 'user_id'

        try {
            // Preparar la consulta SQL
            $stmt = $conn->prepare("
                INSERT INTO producto (nombre, consi, fecha, fragi, category, id) 
                VALUES (:nombre, :consi, :fecha, :fragi, :category, :id)
            ");

            // Asignar valores a los parámetros
            $stmt->bindValue(':nombre', $nombre);
            $stmt->bindValue(':consi', $consi);
            $stmt->bindValue(':fecha', $fecha);
            $stmt->bindValue(':fragi', $priority);
            $stmt->bindValue(':category', $category);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                echo 'Producto agregado con éxito.';
            } else {
                echo 'Error al agregar el producto.';
            }
        } catch (PDOException $e) {
            // Manejar errores de la base de datos
            echo 'Error en la base de datos: ' . $e->getMessage();
        }
    } else {
        // Si no hay sesión activa, redirigir al inicio de sesión
        echo 'ID de sesión no definido. Redirigiendo al inicio de sesión.';
        header("Location: login.php");
        exit;
    }
}
?>
