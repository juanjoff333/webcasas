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

// Recibir los datos del formulario
$imagen = $_POST['imagen'];
$referencia = $_POST['referencia'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];

// Insertar datos en la base de datos
$sql = "INSERT INTO info_casas (imagen, referencia, titulo, descripcion) VALUES ('$imagen', '$referencia', '$titulo', '$descripcion')";

if ($conn->query($sql) === TRUE) {
    echo "Datos guardados correctamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// Redirigir a la página principal
header("Location: index.php");
exit();
?>
