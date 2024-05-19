<?php
$usuario = $_POST['user'];
$contraseña = $_POST['password'];
session_start();
$_SESSION['user'] = $usuario;

$conexion = mysqli_connect("localhost", "root", "", "car_ecommerce");

$consulta = "SELECT*FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_fetch_array($resultado);

switch ($filas['id_rol']) {
    case 1:
        # code...
        header("location:vendedor.php");
        break;
    case 2:
        header("location:cliente.php");
        break;
    case 3:
        header("location:admin.php");
        break;
    default:
        # code...
?>
        <?php
        include("index.html");
        ?>
        <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
<?php
        break;
}

mysqli_free_result($resultado);
mysqli_close($conexion);
