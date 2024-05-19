<?php
$conexion = mysqli_connect("localhost", "root", "", "car_ecommerce");
$id = $_POST['id'];
$consulta = "SELECT*FROM usuarios where id='$id'";
$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_fetch_array($resultado);
$nombre = $filas['nombre'];
$apellido = $filas['apellido'];
$telefono = $filas['telefono'];
$correo = $filas['correo'];
?>
<body>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Vehículo</title>
    <!-- Incluir CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Actualizar Usuario</h1>
        <form action="actualizarUsuario.php" method="post">
            <div class="mb-3">
                <label for="id" class="form-label">Id:</label>
                <input type="number" class="form-control" id="id" name="id" value="<?php echo $id; ?>">
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $apellido; ?>" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo:</label>
                <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $correo; ?>" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono:</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
        </form>
    </div>

    <!-- Incluir JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>

</body>

</html>