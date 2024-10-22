<?php
header('Content-Type: application/json');
include 'database.php'; // Incluye tu conexión a la base de datos

$data = json_decode(file_get_contents("php://input"), true);

// Aquí debes agregar la lógica para insertar el producto en la base de datos
$query = "INSERT INTO productos (nombre, precio, unidades, modelo, marca, detalles) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("sdisss", $data['nombre'], $data['precio'], $data['unidades'], $data['modelo'], $data['marca'], $data['detalles']);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Producto agregado']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error al agregar producto']);
}

$stmt->close();
$conn->close();
?>
