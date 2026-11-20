<?php
$servername = "localhost";
$username = "root";
$password = ""; // Cambiar si tienes una contraseña configurada
$dbname = "casas";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos de la base de datos
$sql = "SELECT * FROM info_casas";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página con Logo y Buscador</title>
    <style>
    <style>
        /* Estilos CSS aquí */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        .info-section {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        form label {
            font-size: 14px;
            font-weight: bold;
            color: #b30000;
        }

        form input[type="text"],
        form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        form textarea {
            resize: vertical;
            height: 100px;
        }

        form button {
            background-color: #b30000;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form button:hover {
            background-color: #990000;
        }

        .info-section h2 {
            font-size: 24px;
            color: #b30000;
            text-align: center;
        }

        .info-section p {
            font-size: 14px;
            text-align: center;
            color: #666;
        }
    </style>
</head>
<body>
    



    <div class="info-section">

    <!-- Formulario para agregar o actualizar -->
    <form action="guardar.php" method="post">
        <label for="imagen">Imagen:</label>
        <input type="text" name="imagen" id="imagen" required>
        
        <label for="referencia">Referencia:</label>
        <input type="text" name="referencia" id="referencia" required>
        
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" required>
        
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" required></textarea>
        
        <button type="submit">Guardar</button>
    </form>

    </div>


</body>
</html>
