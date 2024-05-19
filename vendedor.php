<?php
include 'conexion.php';
session_start();
$conexion = mysqli_connect("localhost", "root", "", "car_ecommerce");

// Verifica si el usuario está logueado
if (!isset($_SESSION['user'])) {
    header("Location: index.html");
    exit();
}
$username = $_SESSION['user'];

$consulta = "SELECT*FROM usuarios where usuario='$username'";
$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_fetch_array($resultado);
$id = $filas['id'];

?>

<body>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Registro de Vehículo</title>
        <!-- Agregar enlaces a los estilos CSS de Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
            <h1 class="text-primary">Registrar Nuevo Vehículo</h1>
            <form action="registrar_vehiculo.php" method="post">
                <div class="mb-3">
                    <label for="placa" class="form-label">Placa:</label>
                    <input type="text" class="form-control" id="placa" name="placa" required>
                </div>
                <div class="mb-3">
                    <label for="modelo" class="form-label">Modelo:</label>
                    <input type="text" class="form-control" id="modelo" name="modelo" required>
                </div>
                <div class="mb-3">
                    <label for="color" class="form-label">Color:</label>
                    <input type="text" class="form-control" id="color" name="color" required>
                </div>
                <div class="mb-3">
                    <label for="estado" class="form-label">Estado:</label>
                    <select class="form-select" id="estado" name="estado" required>
                        <option value="1">NUEVO</option>
                        <option value="2">USADO</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio:</label>
                    <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="id_vendedor" class="form-label">Vendedor:</label>
                    <select class="form-select" id="id_vendedor" name="id_vendedor" required>
                        <!-- Aquí deberías incluir las opciones dinámicas cargadas desde la base de datos -->
                        <?php
                        $stmt = $pdo->query("SELECT id,nombre from usuarios where id_rol=1");
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value=\"{$row['id']}\">{$row['nombre']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="id_categoria" class="form-label">Categoría:</label>
                    <select class="form-select" id="id_categoria" name="id_categoria" required>
                        <!-- Aquí deberías incluir las opciones dinámicas cargadas desde la base de datos -->
                        <?php
                        $stmt = $pdo->query("SELECT id, nombre FROM categorias");
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value=\"{$row['id']}\">{$row['nombre']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Registrar Vehículo</button>
            </form>

            <form action="editarPerfil.php" method="post">
                <!-- Campo oculto para enviar el ID de sesión -->
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit" class="btn btn-primary">Editar Usuario</button>
            </form>
        </div>

        <!-- Agregar el script de Bootstrap JS al final del cuerpo del documento -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+cv8e8z5FzOPIpL8E0GXy7C1t2I3LIha9Lq12K4D/B6tFvBv8HquM2L9gi" crossorigin="anonymous"></script>
    </body>

    </html>


</body>

</html>