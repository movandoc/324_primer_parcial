<?php
include_once("conexion.php");
$id_cliente=$_REQUEST["id"];
$consulta_registro="SELECT * FROM cuenta_bancaria WHERE id_cliente='$id_cliente'";
$resultado=mysqli_query($conn, $consulta_registro) or die ("No se logro registrar");
$columna=mysqli_fetch_array($resultado);

if($columna){
    $n_cuenta=$columna['n_cuenta'];
    $tipo=$columna['tipo'];
    $saldo=$columna['saldo'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRAR CUENTA</title>
</head>
<body>
    <h3>Añadir Nueva Cuenta
        <?php 
        /*if($columna){
            echo "Cuenta N° $n_cuenta";
        }else{
            echo "Agregar Nueva Cuenta";
        }*/
        ?>
    </h3>
    <form action="cuenta_registrar.php" method="REQUEST">
        <fieldset>
            <legend class="datos">DATOS PERSONALES</legend>

            <input type="hidden" name="id_cliente" value="<?php echo $id_cliente; ?>" id="">

            <legend class="datos">TIPO</legend>
            <select name="tipo" id="">
                <option value="ahorros" selected="selected">AHORROS</option>
                <option value="corriente">CORRIENTE</option>
                <option value="jubilacion">JUBILACION</option>
                <option value="Plazo Fijo">PLAZO FIJO</option>
                <option value="estudiante">ESTUDIANTIL</option>
            </select>

            <legend class="datos">SALDO</legend>
            <input type="text" name="saldo" id=""><br>

            <input type="submit" value="REGISTRAR">
            <input type="reset" value="BORRAR">
        </fieldset>
    </form>
</body>
</html>