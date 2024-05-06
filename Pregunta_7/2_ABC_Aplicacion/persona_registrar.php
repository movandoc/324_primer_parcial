<?php
include_once("conexion.php");
$existe_registro=false;
    if (isset($_REQUEST["ci"]) && !empty($_REQUEST["ci"]) &&
        isset($_REQUEST["nombre"]) && !empty($_REQUEST["nombre"]) &&
        isset($_REQUEST["ap_pat"]) && !empty($_REQUEST["ap_pat"]) &&
        isset($_REQUEST["ap_mat"]) && !empty($_REQUEST["ap_mat"]) &&
        isset($_REQUEST["date"]) && !empty($_REQUEST["date"]) &&
        isset($_REQUEST["tipo"]) && !empty($_REQUEST["tipo"]) &&
        isset($_REQUEST["email"]) && !empty($_REQUEST["email"]) &&
        isset($_REQUEST["depto"]) && !empty($_REQUEST["depto"]) &&
        isset($_REQUEST["psw"]) && !empty($_REQUEST["psw"])
    ){
        $id_cliente=$_REQUEST["ci"];
        $nombre=$_REQUEST["nombre"];
        $ap_pat=$_REQUEST["ap_pat"];
        $ap_mat=$_REQUEST["ap_mat"];
        $tipo=$_REQUEST["tipo"];
        $fecha_nac=$_REQUEST["date"];
        $email=$_REQUEST["email"];
        $depto=$_REQUEST["depto"];
        $psw=$_REQUEST["psw"];

        $existe_registro=true;
    }

    if($existe_registro){
        $consulta_registro="INSERT INTO persona
                    VALUES ('$id_cliente', '$nombre','$ap_pat', '$ap_mat','$fecha_nac', '$tipo', '$email', '$depto', '$psw')";
        $resultado=mysqli_query($conn, $consulta_registro) or die ("No se logro registrar");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRADO</title>
</head>
<body>
    <p>CLIENTE REGISTRADO EXITOSAMENTE</p>
    <form action="personas.php" method="request">
        <input type="submit" value="VER A LOS CLIENTES">
    </form>
</body>
</html>