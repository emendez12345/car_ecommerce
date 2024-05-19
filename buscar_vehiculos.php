<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda</title>
    <!-- Incluir CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <?php
        // Conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "car_ecommerce";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("<div class='alert alert-danger'>Conexión fallida: " . $conn->connect_error . "</div>");
        }

        // Verificar si se ha enviado una categoría
        if (isset($_GET["categoria"])) {
            $categoria_id = intval($_GET["categoria"]);
            $precio_min = floatval($_GET["precio_min"]);
            $precio_max = floatval($_GET["precio_max"]);

            // Consultar los vehículos de la categoría y dentro del rango de precios
            $sql = "SELECT v.modelo, v.color, v.precio, v.id_vendedor, u.telefono
                    FROM vehiculos v
                    INNER JOIN usuarios u ON v.id_vendedor = u.id
                    WHERE v.id_categoria = $categoria_id
                    AND v.precio BETWEEN $precio_min AND $precio_max";
            $result = $conn->query($sql);

            if ($result) {
                if ($result->num_rows > 0) {
                    // Convertir los resultados a un array
                    $vehiculos = [];
                    while ($row = $result->fetch_assoc()) {
                        $vehiculos[] = $row;
                    }

                    echo "<h2 class='mb-4'>Resultados de la búsqueda</h2>";
                    echo "<table class='table table-bordered'>
                            <thead class='thead-light'>
                                <tr>
                                    <th>Modelo</th>
                                    <th>Color</th>
                                    <th>Precio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>";

                    // Usar foreach para recorrer el array
                    foreach ($vehiculos as $vehiculo) {
                        echo "<tr>
                                <td>" . htmlspecialchars($vehiculo["modelo"]) . "</td>
                                <td>" . htmlspecialchars($vehiculo["color"]) . "</td>
                                <td>" . htmlspecialchars($vehiculo["precio"]) . "</td>
                                <td><a href='ver_vendedor.php?id_vendedor=" . intval($vehiculo["id_vendedor"]) . "' class='btn btn-info'>Ver datos del vendedor</a></td>
                            </tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<div class='alert alert-warning'>No se encontraron vehículos para esta categoría.</div>";
                }
            } else {
                // Mostrar el error de la consulta
                echo "<div class='alert alert-danger'>Error en la consulta: " . $conn->error . "</div>";
            }
        } else {
            echo "<div class='alert alert-info'>Por favor, seleccione una categoría.</div>";
        }

        $conn->close();
        ?>
    </div>

    <!-- Incluir JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
