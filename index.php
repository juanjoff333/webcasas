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

// Configurar la codificación UTF-8 para manejar caracteres especiales
if (!$conn->set_charset("utf8")) {
    die("Error configurando la codificación UTF-8: " . $conn->error);
}

// Obtener datos de la base de datos
$sql = "SELECT * FROM info_casas";
$result = $conn->query($sql);

if (!$result) {
    die("Error ejecutando la consulta: " . $conn->error);
}
?>

<?php
header('Content-Type: text/html; charset=utf-8');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página con Logo y Buscador</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        header {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        .logo h1 {
            color: rgb(235, 12, 12);
        }

        .search-bar {
            display: flex;
            align-items: center;
            flex-grow: 1;
            max-width: 600px;
            margin-left: 20px;
            margin-right: 20px;
            justify-content: center;
        }

        .search-bar input {
            width: 100%;
            padding: 10px;
            border: 1px solid #df1414;
            border-radius: 5px 0 0 5px;
            outline: none;
        }

        .search-bar button {
            padding: 10px;
            background-color: red;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 0 5px 5px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s ease;
        }

        .search-bar button img {
            width: 20px;
        }

        .search-bar button:hover {
            background-color: darkred;
        }

        .image-container {
            width: 100vw;
            height: 60vh;
            overflow: hidden;
            position: relative;
        }

        .image-container img {
            width: 100vw;
            height: 60vh;
            object-fit: fill;
            position: absolute;
            transition: opacity 1s ease-in-out;
        }

        .image-container img.hidden {
            opacity: 0;
        }

        .text-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 2rem;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            text-align: center;
            z-index: 1;
        }

        .info-section {
            display: flex;
            width: 90%;
            margin: 20px auto;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .image-wrapper {
            width: 40%;
            overflow: hidden;
            position: relative;
        }

        .image-wrapper a {
            display: block;
        }

        .image-wrapper img {
            width: 100%;
            height: auto;
            display: block;
            transition: filter 0.3s ease, transform 0.3s ease;
        }

        .image-wrapper img:hover {
            filter: brightness(70%);
            transform: scale(1.05);
            cursor: pointer;
        }

        .info-text {
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        @media (max-width: 768px) {
            header {
                flex-direction: column;
                align-items: flex-start;
            }

            .search-bar {
                margin-left: 5px;
                width: 100%;
            }

            .search-bar input {
                border-radius: 5px;
            }

            .search-bar button {
                border-radius: 5px;
                width: auto;
                padding: 8px 12px;
            }

            .info-section {
                flex-direction: column;
                align-items: center;
            }

            .image-wrapper {
                width: 100%;
            }

            .info-text {
                text-align: center;
            }
        }
    </style>
</head>
<body>
    
    <header>
        <div class="logo">
            <img src="img/logo.png" alt="Logo">
            <h1>Red Cat</h1>
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Buscar...">
            <button><img src="img/lupa.png" alt="Buscar"></button>
        </div>
    </header>

    <div class="image-container">
        <a id="image-link" href="casa1.html">
            <div class="text-overlay" id="image-text">Casa Moderna y Espaciosa</div>
            <img id="image1" src="img/1.jpg" alt="Casa 1">
            <img id="image2" src="img/2.jpg" class="hidden" alt="Casa 2">
        </a>
    </div>

    <div class="info-section">

    <?php while ($row = $result->fetch_assoc()) : ?>
        <div class="info-section">
            <div class="image-wrapper">
                <a href="<?php echo $row['referencia']; ?>">
                    <img src="<?php echo $row['imagen']; ?>" alt="Casa Descripción">
                </a>
            </div>
            <div class="info-text">
                <h2><?php echo $row['titulo']; ?></h2>
                <p><?php echo $row['descripcion']; ?></p>
            </div>
        </div>
    <?php endwhile; ?>

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

    <script>
        const images = [
            {
                src: "img/1.jpg",
                link: "casa1.html",
                text: "",
                element: document.getElementById('image1')
            },
            {
                src: "img/2.jpg",
                link: "casa2.html",
                text: "",
                element: document.getElementById('image2')
            }
        ];

        let currentIndex = 0;
        const imageLink = document.getElementById('image-link');
        const imageText = document.getElementById('image-text');

        setInterval(() => {
            images[currentIndex].element.classList.add('hidden');
            currentIndex = (currentIndex + 1) % images.length;
            images[currentIndex].element.classList.remove('hidden');
            imageLink.href = images[currentIndex].link;
            imageText.textContent = images[currentIndex].text;
        }, 5000);
    </script>
</body>
</html>
