<?php
include 'database.php';
session_start();



    // Datos predefinidos (puedes cambiarlos o sacarlos de una base de datos)
    $nombre = 'Plástico PS (Poliestireno)';
    $consi = 'El plástico PS (Poliestireno) es un material ligero, económico y versátil, ampliamente utilizado en aplicaciones de embalaje y productos desechables. Su estructura le proporciona rigidez y facilidad para el moldeado en diversas formas y tamaños.';
    $fecha = '2024-12-03';
    $priority = 'Media';
    $category = 'Plastico';

    // Verificar si el usuario está autenticado
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id']; // Cambiar a 'user_id'

        try {
            // Preparar la consulta SQL para insertar el producto
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
                // Devolver un mensaje de éxito
                echo 'Producto agregado con éxito.';
            } else {
                // Si hay error al agregar el producto
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

?>
