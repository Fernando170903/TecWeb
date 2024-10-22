<?php
header('Content-Type: application/json');
include 'database.php'; // Incluye tu conexión a la base de datos

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['id'])) {
    $id = $data['id'];
    $nombre = $data['nombre'];
    $precio = $data['precio'];
    $unidades = $data['unidades'];
    $modelo = $data['modelo'];
    $marca = $data['marca'];
    $detalles = $data['detalles'];

    // Aquí deberías hacer la consulta para actualizar el producto en tu base de datos
    $query = "UPDATE productos SET nombre = ?, precio = ?, unidades = ?, modelo = ?, marca = ?, detalles = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sdissssi", $nombre, $precio, $unidades, $modelo, $marca, $detalles, $id);
    
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Producto actualizado']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error al actualizar producto']);
    }
    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'ID de producto no proporcionado']);
}

$conn->close();
?>
