<?php
include_once "conexion.php";
// Iniciar la sesión
session_start();

// Verificar si se enviaron datos de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar las credenciales
    $email = $_POST["username"];
    $psw = $_POST["psw"];

    $consulta_log="SELECT * FROM persona where email='$email'";
    $resultado_log=mysqli_query($conn, $consulta_log) or die ("No existe este correo");
    $columna_per=mysqli_fetch_array($resultado_log);
    $contrasenia=$columna_per["contrasenia"];

    if ($contrasenia == $psw) {
        // Credenciales válidas, iniciar sesión y redirigir al usuario a la página de inicio
        $_SESSION["username"] = $email;
        $tipo=$columna_per["tipo"];
        $id=$columna_per["ci"];
        if($tipo=="ADMIN") header("Location: personas.php");
        if($tipo=="USUARIO") header("Location: usuario_cuenta.php?id=$id");
        if($tipo=="DIRECTOR") header("Location: director_deptos.php");
    } else {
        // Credenciales inválidas, mostrar mensaje de error
        echo "Usuario o contraseña incorrectos. Por favor, intenta de nuevo.";
        header("Location: index.php");
    }
}
?>

