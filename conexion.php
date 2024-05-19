<?php
// Configuración de la base de datos
$host = 'localhost'; // o el nombre de host donde esté tu base de datos
$dbname = 'car_ecommerce';
$username = 'root';
$password = '';

// Configurar opciones de PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// Crear la conexión
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password, $options);
} catch (PDOException $e) {
    // Manejo de errores
    echo 'Error de conexión: ' . $e->getMessage();
    exit;
}
?>
