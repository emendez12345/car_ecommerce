<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_ecommerce";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultar las categorías
$sql = "SELECT id, nombre FROM categorias";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Vehículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1>Buscar Vehículos por Categoría</h1>
    <form action="buscar_vehiculos.php" method="GET">
    <div class="mb-3">
        <label for="categoria" class="form-label">Seleccione una categoría:</label>
        <select name="categoria" id="categoria" class="form-select">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
                }
            } else {
                echo "<option value=''>No hay categorías disponibles</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="precio_min" class="form-label">Precio Mínimo:</label>
        <input type="number" name="precio_min" id="precio_min" class="form-control" min="0" step="0.01">
    </div>
    <div class="mb-3">
        <label for="precio_max" class="form-label">Precio Máximo:</label>
        <input type="number" name="precio_max" id="precio_max" class="form-control" min="0" step="0.01">
    </div>
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>

</body>
</html>
