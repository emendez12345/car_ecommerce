<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del Vendedor</title>
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

        if (isset($_GET["id_vendedor"])) {
            $id_vendedor = intval($_GET["id_vendedor"]);

            $sql = "SELECT nombre, apellido, telefono FROM usuarios WHERE id = $id_vendedor";
            $result = $conn->query($sql);

            if ($result) {
                if ($result->num_rows > 0) {
                    $vendedor = $result->fetch_assoc();
                    echo "<h1 class='mb-4'>Datos del Vendedor</h1>";
                    echo "<p><strong>Nombre:</strong> " . htmlspecialchars($vendedor["nombre"]) . " " . htmlspecialchars($vendedor["apellido"]) . "</p>";
                    echo "<p><strong>Teléfono:</strong> " . htmlspecialchars($vendedor["telefono"]) . "</p>";
                } else {
                    echo "<div class='alert alert-warning'>No se encontraron datos del vendedor.</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Error en la consulta: " . $conn->error . "</div>";
            }
        } else {
            echo "<div class='alert alert-info'>ID del vendedor no proporcionado.</div>";
        }

        $conn->close();
        ?>
    </div>

    <!-- Incluir JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
