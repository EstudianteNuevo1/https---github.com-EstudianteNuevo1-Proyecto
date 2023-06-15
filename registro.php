<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "registro";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

if (!$enlace) {
    echo 'Error al conectar con el servidor';
    exit;
}

if (!mysqli_select_db($enlace, $baseDeDatos)) {
    echo 'Error al seleccionar la base de datos';
    exit;
}

if (isset($_POST['Registro'])) {
    $nombre = $_POST["nombre"];
    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    $id = rand(1, 1000000);

    $insertarDatos = "INSERT INTO datos (Nombre, Email, Contrasena, Usuario, ID) VALUES ('$nombre', '$email', '$contrasena', '$usuario', '$id')";

    $ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

    if (!$ejecutarInsertar) {
        echo 'Error al ejecutar la consulta de inserción';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <section class="formulario_registro">
        <div class="formulario">
            <form action="#" method="post">
                <div class="nombre">
                    <input type="text" name="nombre" required>
                    <label>Ingrese su nombre</label>
                </div>

                <div class="usuario">
                    <input type="text" name="usuario">
                    <label>Ingrese un nombre de usuario</label>
                </div>

                <div class="email">
                    <input type="email" name="email">
                    <label>Ingrese su correo electrónico</label>
                </div>

                <div class="contrasena">
                    <input type="password" name="contrasena">
                    <label>Ingrese una contraseña</label>
                </div>

                <input type="submit" value="Registro" name="Registro">

                <div class="Sesion"><a href="#">¿Ya tiene una cuenta?</a></div>
            </form>
        </div>
    </section>
</body>
</html>
