<?php
include 'database.php';
session_start();



    // Datos predefinidos (puedes cambiarloe de datos)
    $nombre = 'Descripción del Producto: Papel Kraft';s o sacarlos de una bas
    $consi = 'El papel Kraft, también conocido como papel de estraza o papel madera, es un papel grueso y resistente de color marrón, fabricado sin blanquear para conservar su resistencia natural. Su proceso de fabricación lo convierte en un material de alta durabilidad, ideal para múltiples aplicaciones de envoltura y embalaje.';
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
