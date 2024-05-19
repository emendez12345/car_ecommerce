<?php
// Recibe los datos del cliente
$conexion = mysqli_connect("localhost", "root", "", "car_ecommerce");

if ($conexion === false) {
    die("ERROR: No se pudo conectar. " . mysqli_connect_error());
}

$iduser = $_POST['id'];
$id = (int)$iduser;
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

session_start();

// Prepara la consulta
$consulta = $conexion->prepare("UPDATE usuarios SET nombre = ?, apellido = ?, telefono = ?, correo = ? WHERE id = ?");

if ($consulta === false) {
    die("ERROR: No se pudo preparar la consulta. " . $conexion->error);
}

// Vincula los parámetros
$consulta->bind_param("ssssi", $nombre, $apellido, $telefono, $correo, $id);

// Ejecuta la consulta
$resultado = $consulta->execute();

if ($resultado) {
    echo "Usuario Actualizado.";
} else {
    echo "Error al actualizar el usuario: " . $consulta->error;
}

// Cierra la consulta y la conexión
$consulta->close();
$conexion->close();
?>
