<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "alasc"; // Tu base de datos correcta

$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
  die(json_encode(['existe' => false, 'error' => 'Error de conexión']));
}

// Obtener el código de barras enviado
$barcode = $_POST['barcode'] ?? '';

if ($barcode != '') {
  // Preparar consulta
  $stmt = $conn->prepare("SELECT Nombre, Precio FROM productos WHERE CodBarras = ?");
  $stmt->bind_param("s", $barcode);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($row = $result->fetch_assoc()) {
    echo json_encode([
      'existe' => true,
      'nombre' => $row['Nombre'],
      'precio' => floatval($row['Precio'])
    ]);
  } else {
    echo json_encode(['existe' => false]);
  }

  $stmt->close();
} else {
  echo json_encode(['existe' => false]);
}

$conn->close();
?>
