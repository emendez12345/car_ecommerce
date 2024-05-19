<?php
include 'conexion.php';

$placa = $_POST['placa'];
$modelo = $_POST['modelo'];
$color = $_POST['color'];
$estado = $_POST['estado'];
$precio = $_POST['precio'];
$id_vendedor = $_POST['id_vendedor'];
$id_categoria = $_POST['id_categoria'];

// Verificar que no existe un vehículo con la misma placa
$stmt = $pdo->prepare("SELECT COUNT(*) FROM vehiculos WHERE placa = ?");
$stmt->execute([$placa]);
if ($stmt->fetchColumn() > 0) {
    die("Error: Ya existe un vehículo con la placa $placa.");
}

// Insertar nuevo vehículo
$stmt = $pdo->prepare("INSERT INTO vehiculos (placa, modelo, color, estado, precio, id_vendedor, id_categoria) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([$placa, $modelo, $color, $estado, $precio, $id_vendedor, $id_categoria]);

echo "Vehículo registrado con éxito.";
?>
