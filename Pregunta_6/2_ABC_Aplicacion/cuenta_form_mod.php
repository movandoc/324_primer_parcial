<?php

if (isset($_REQUEST["id"])){ //*Solo ejecutar si esque hay un Id para modificar
    //echo $_REQUEST['id'];
    include_once("conexion.php"); 
    
                    //! DESDE ACA COMIENZA
    //* MODIFICACION DE DATOS SEGUN EL ID
    $id=$_REQUEST["id"];
    $consulta="SELECT * FROM cuenta_bancaria where id_cliente='$id'";
    $resultado=mysqli_query($conn, $consulta) or die ("No se ha podido ejecutar la consulta");
    $columna=mysqli_fetch_array($resultado) or die ("No se pudo mostrar el resultado");
    //echo $nombre=$columna['NOMBRE'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICAR CLIENTE</title>
</head>
<body>
    <form action="cuenta_modificar.php" method="REQUEST">
        <fieldset>
            <legend class="datos">DATOS DE LA CUENTA <?php echo $columna['n_cuenta']; ?> </legend>

            <input type="hidden" name="id_cliente" value="<?php echo $id; ?>" id="">
            <input type="hidden" name="n_cuenta" value="<?php echo $columna['n_cuenta']; ?>" id="">

            <legend class="datos">TIPO</legend>
            <select name="tipo" id="">
                <option value="ahorros" selected="selected">AHORROS</option>
                <option value="corriente">CORRIENTE</option>
                <option value="jubilacion">JUBILACION</option>
                <option value="Plazo Fijo">PLAZO FIJO</option>
                <option value="estudiante">ESTUDIANTIL</option>
            </select>

            <legend class="datos">SALDO</legend>
            <input type="text" name="saldo" value="<?php echo $columna['saldo']; ?>" id=""><br>

            <input type="submit" value="REGISTRAR">
            <input type="reset" value="BORRAR">
        </fieldset>
    </form>
    
    <form action="persona_cuentas.php" method="request">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" value="IR ATRAS">
    </form>
</body>
</html>