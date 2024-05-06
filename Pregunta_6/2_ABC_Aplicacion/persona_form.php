<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRAR PERSONA</title>
</head>
<body>
    <form action="persona_registrar.php" method="REQUEST">
        <fieldset>
            <legend class="datos">DATOS PERSONALES</legend>

            <legend class="datos">CARNET IDENTIDAD</legend>
            <input type="text" name="ci" id=""><br>
            
            <legend class="datos">NOMBRE</legend>
            <input type="text" name="nombre" id=""><br>

            <legend class="datos">APELLIDO PATERNO</legend>
            <input type="text" name="ap_pat" id=""><br>

            <legend class="datos">APELLIDOS MATERNO</legend>
            <input type="text" name="ap_mat" id=""><br>

            <legend class="datos">FECHA DE NACIMIENTO</legend>
            <input type="date" name="date" id=""><br>

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
            <input type="email" name="email" id=""><br>

            <legend class="datos">CONTRASEÑA</legend>
            <input type="password" name="psw" id="">

            <input type="submit" value="REGISTRAR">
            <input type="reset" value="BORRAR">
        </fieldset>
        <input type="submit" value="VER REGISTROS">
    </form>
</body>
</html>