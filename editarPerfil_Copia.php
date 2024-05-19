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
    </head>

    <body>
        <h1>Editar Perfil</h1>
        <form id="myForm">
            Nombre: <input type="text" name="nombre" id="nombre" required><br>
            Apellido: <input type="text" name="apellido" id="apellido" required><br>
            Teléfono: <input type="text" name="telefono" id="telefono" required><br>
            Correo: <input type="text" name="correo" id="correo" required><br>
            <button type="button" onclick="guardarDatos()">Guardar</button>
        </form>

        <script>
            // Función para prellenar los campos de texto
            window.onload = function() {
                document.getElementById("nombre").value = "<?php echo $nombre; ?>";
                document.getElementById("apellido").value = "<?php echo $apellido; ?>";
                document.getElementById("telefono").value = "<?php echo $telefono; ?>";
                document.getElementById("correo").value = "<?php echo $correo; ?>";
            };

            // Función para enviar los datos al servidor
            function guardarDatos() {
                var nombre = document.getElementById("nombre").value;
                var apellido = document.getElementById("apellido").value;
                var telefono = document.getElementById("telefono").value;
                var correo = document.getElementById("correo").value;

                var datos = {
                    id:<?php echo $id; ?>,
                    nombre: nombre,
                    apellido: apellido,
                    telefono: telefono,
                    correo: correo
                };


                // Aquí puedes enviar los datos al servidor, por ejemplo usando AJAX o simplemente enviando el formulario
                // Por ahora, simplemente mostraremos un mensaje con los datos
                console.log(datos);
    
                // Envía los datos al servidor usando AJAX
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "actualizarUsuario.php", true);
                xhr.setRequestHeader("Content-Type", "application/json");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        // La solicitud se ha completado y la tabla se ha actualizado correctamente
                        console.log("Los datos se han guardado correctamente.");
                    } else {
                        // Ocurrió un error al enviar los datos
                        console.error("Error al guardar los datos.");
                    }
                };
                xhr.send(JSON.stringify(datos));
            }
        </script>
    </body>

    </html>
</body>

</html>