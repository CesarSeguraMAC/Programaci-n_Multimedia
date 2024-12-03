<?php
include 'database.php';
session_start();



    // Datos predefinidos (puedes cambiarloe de datos)
    $nombre = 'Descripción del Producto: Papel Testliner';
    $consi = 'El papel Testliner es un material resistente y reciclado, fabricado principalmente con fibra recuperada y, en algunos casos, con un aporte de fibra virgen para mayor durabilidad. Su acabado encolado y su versatilidad lo convierten en una excelente opción para el recubrimiento exterior de cartones corrugados, proporcionando protección y estética en embalajes.';
    $fecha = '2024-12-03';
    $priority = 'Media';
    $category = 'Papel';

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
