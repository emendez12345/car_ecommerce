<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Ahora puedes usar $pdo para interactuar con la base de datos
try {
    $stmt = $pdo->query('SELECT * FROM usuarios');
    while ($row = $stmt->fetch()) {
        echo $row['nombre'] . "<br>";
    }
} catch (PDOException $e) {
    echo 'Error en la consulta: ' . $e->getMessage();
}
?>
