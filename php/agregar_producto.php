<?php
// Conexión a la base de datos (ajusta los valores según tu configuración)
$host = "localhost";
$user = "root";
$pass = "";
$db = "alasc"; // nombre de tu base de datos

$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Validar que los datos existen
if (isset($_POST['nombre'], $_POST['barcode'], $_POST['precio'])) {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $barcode = $conn->real_escape_string($_POST['barcode']);
    $precio = floatval($_POST['precio']);

    // Insertar en la tabla (ajusta el nombre de la tabla y columnas si es necesario)
    $sql = "INSERT INTO productos (nombre, CodBarras, precio) VALUES ('$nombre', '$barcode', $precio)";
    
    if ($conn->query($sql) === TRUE) {
        echo "Producto agregado exitosamente.";
    } else {
        echo "Error al agregar producto: " . $conn->error;
    }
} else {
    echo "Faltan datos.";
}

$conn->close();
?>
