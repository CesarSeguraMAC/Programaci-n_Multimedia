<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgendaPlus - Panel de Tareas</title>
    <link rel="stylesheet" href="stylesproducto.css">
    <link rel="icon" href="Imagenes/monarca.jpeg" type="imagen/png">
    
    <style>

        
            body{
        background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
    
            }

.capa{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #1c1c1d;
    opacity: 0.5;
    mix-blend-mode: overlay;

}

.container {
    background: linear-gradient(135deg, #126cfe 0%, #c2e9fb 100%);
    position: relative; 
    z-index: 2;
}


    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    
    
    <script>
        $(document).ready(function() {
            $('#new-task-button').click(function() {
                $('#task-form-modal').show();
            });
            
            $('#cancel-task').click(function() {
                $('#task-form-modal').hide();
            });

            $('#task-form').submit(function(event) {
                event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'add_task.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response);
                        location.reload();
                    },
                    error: function() {
                        alert('Error al agregar la tarea.');
                    }
                });
            });

            // Redirigir al usuario a la página de tareas cuando haga clic en el botón "Ver Tareas"
            $('#view-tasks-button').click(function() {
                window.location.href = 'ver_productos.html';
            });
        });

      


          
       
    </script>




</head>
<body >
    
    <div class="container" >
        <h1>Realiza tu compra!!</h1>
        <button id="new-task-button">Agregar al carrito</button>
        <button id="view-tasks-button">Ver tus productos</button>
        <table>
            
            <tbody id="task-list">
                
            </tbody>
        </table>

        <div id="task-form-modal" style="display: none;">
            <form id="task-form">
                <label for="task-title">Nombre:</label>
                <input type="text" id="task-title" name="nombre" required>
                <label for="task-category">Categoría:</label>
               <select id="task-category" name="category" required>
                <option value="Tela">Tela</option>
                <option value="Papel">Papel</option>
                <option value="Metal">Metal</option>
                 <option value="Plastico">Plastico</option>
                  </select>
                <label for="task-desc">Consideraciones adicionales:</label>
                <textarea id="task-desc" name="consi" required></textarea>
                <label for="task-deadline">Fecha de entrega:</label>
                <input type="date" id="task-deadline" name="fecha" required>
                <label for="task-priority">Fragilidad:</label>
                <select id="task-priority" name="fragi" required>
                    <option value="Alta">Alta</option>
                    <option value="Media">Media</option>
                    <option value="Baja">Baja</option>
                </select>
                <button type="submit">Guardar</button>
                <button type="button" id="cancel-task">Cancelar</button>
            </form>
        </div>

        
    </div>

</div>






</body>
</html>
