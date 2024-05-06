<?php
include_once("conexion.php");
$existe_registro=false;
    if (isset($_REQUEST["id_cliente"]) && !empty($_REQUEST["id_cliente"]) &&
        isset($_REQUEST["tipo"]) && !empty($_REQUEST["tipo"]) &&
        isset($_REQUEST["saldo"]) && !empty($_REQUEST["saldo"])
    ){
        $id_cliente=$_REQUEST["id_cliente"];
        $tipo=$_REQUEST["tipo"];
        $saldo=$_REQUEST["saldo"];

        $existe_registro=true;
    }

    if($existe_registro){
        $consulta_registro="INSERT INTO cuenta_bancaria (id_cliente, tipo, saldo)  VALUES ('$id_cliente', '$tipo', '$saldo')";
        $consulta_nombre="SELECT * FROM persona WHERE ci='$id_cliente'";
        $resultado=mysqli_query($conn, $consulta_registro) or die ("No se logro registrar");
    }
?>

<html>
    <p>Se ha añadido la cuenta</p>
    <?php
    echo "<form action='persona_cuentas.php?id=$id_cliente' method='post'>";
    echo "<input type='submit' value='Ver las Cuentas'>";
    echo "</form>";
    ?>
    
</html>