<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

include("conexion.php");

$sql = "SELECT * FROM alumnos";
$resultado = mysqli_query($conexion, $sql);

date_default_timezone_set("America/Mexico_City");
$fecha = date("d/m/Y");
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Panel Principal</title>

<link rel="stylesheet" href="estilos.css">

</head>

<body>

<div class="contenedor">

    <a href="cerrar.php" class="cerrar">Cerrar sesión</a>

    <h1>Sistema de Gestión de Alumnos</h1>

    <hr>

    <h2>Bienvenido: <?php echo $_SESSION['usuario']; ?></h2>

    <p><strong>Fecha:</strong> <?php echo $fecha; ?></p>

    <h3>Listado de Alumnos</h3>

    <table>

        <tr>

            <th>ID</th>
            <th>Nombre</th>
            <th>Carrera</th>
            <th>Promedio</th>

        </tr>

        <?php while($fila=mysqli_fetch_assoc($resultado)){ ?>

        <tr>

            <td><?php echo $fila['id']; ?></td>
            <td><?php echo $fila['nombre']; ?></td>
            <td><?php echo $fila['carrera']; ?></td>
            <td><?php echo $fila['promedio']; ?></td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>