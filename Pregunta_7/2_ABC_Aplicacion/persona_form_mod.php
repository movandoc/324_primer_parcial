<?php

if (isset($_REQUEST["id"])){ //*Solo ejecutar si esque hay un Id para modificar
    //echo $_REQUEST['id'];
    include_once("conexion.php"); 
    
                    //! DESDE ACA COMIENZA
    //* MODIFICACION DE DATOS SEGUN EL ID
    $id=$_REQUEST["id"];
    $consulta="SELECT * FROM persona where ci='$id'";
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
    <form action="persona_modificar.php" method="REQUEST">
        <fieldset>
            <legend class="datos">DATOS PERSONALES</legend>
            <input type="hidden" name="ci" value="<?php echo $columna['ci']; ?>" id="">
            
            <legend class="datos">NOMBRE</legend>
            <input type="text" name="nombre" value="<?php echo $columna['nombre']; ?>" id=""><br>

            <legend class="datos">APELLIDO PATERNO</legend>
            <input type="text" name="ap_pat" value="<?php echo $columna['ap_pat']; ?>" id=""><br>

            <legend class="datos">APELLIDOS MATERNO</legend>
            <input type="text" name="ap_mat" value="<?php echo $columna['ap_mat']; ?>" id=""><br>

            <legend class="datos">FECHA DE NACIMIENTO</legend>
            <input type="date" name="date" value="<?php echo $columna['fe_nac']; ?>" id=""><br>

            <legend class="datos">TIPO</legend>
            <select name="tipo" id="">
                <option value="USUARIO" selected="selected">USUARIO</option>
                <option value="DIRECTOR">DIRECTOR</option>
                <option value="ADMIN">ADMINISTRADOR</option>
            </select>

            <legend class="datos">DEPARTAMENTO</legend>
            <select name="depto" id="">
                <option value="LA PAZ" selected="selected">LA PAZ</option>
                <option value="COCHABAMBA">COCHABAMBA</option>
                <option value="SANTA CRUZ">SANTA CRUZ</option>
                <option value="SANTA CRUZ">ORURO</option>
                <option value="SANTA CRUZ">POTOSI</option>
                <option value="SANTA CRUZ">CHUQUISACA</option>
                <option value="SANTA CRUZ">TARIJA</option>
                <option value="SANTA CRUZ">BENI</option>
                <option value="SANTA CRUZ">PANDO</option>
            </select>

            <legend class="datos">EMAIL</legend>
            <input type="email" name="email" value="<?php echo $columna['email']; ?>" id=""><br>

            <legend class="datos">CONTRASEÑA</legend>
            <input type="password" name="psw" value="<?php echo $columna['contrasenia']; ?>" id="">

            <input type="submit" value="REGISTRAR">
            <input type="reset" value="BORRAR">
        </fieldset>
        <input type="submit" value="VER REGISTROS">
    </form>
</body>
</html>