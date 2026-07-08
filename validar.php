<?php
session_start();

include("conexion.php");

$usuario = $_POST['usuario'];
$password = hash('sha256', $_POST['password']);

$sql = "SELECT * FROM usuarios WHERE usuario = ? AND password = ?";

$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "ss", $usuario, $password);
mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($resultado) > 0) {

    $_SESSION['usuario'] = $usuario;
    header("Location: inicio.php");
    exit();

} else {

    echo "<script>
            alert('Usuario o contraseña incorrectos');
            window.location='index.php';
          </script>";

}
?>