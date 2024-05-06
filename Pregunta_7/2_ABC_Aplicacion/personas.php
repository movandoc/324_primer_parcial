<?php
include_once("conexion.php");
if($conn){
    echo "Conexion exitosa";
}else{
    echo "Conexion fallida";
}
// Cerrar la conexión (opcional)
//mysqli_close($conn);
//TODO CONEXION CON LA TABLA DE PERSONA PARA MOSTRAR
$consulta="SELECT * FROM persona";
$resultado=mysqli_query($conn, $consulta) or die ("No se ja podido mostrar la consulta");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLIENTES</title>
</head>
<body>
<h1>CLIENTES</h1>
    <table border="1">
        <tr>
            <th>CI</th>
            <th>NOMBRE</th>
            <th>APELLIDO PATERNO</th>
            <th>APELLIDO MATERNO</th>
            <th>FECHA_NAC</th>
            <th>TIPO</th>
            <th>DEPARTAMENTO</th>
            <th>EMAIL</th>
            <th>CONTRASEÑA</th>
            <th>DETALLES</th>
            <th colspan="2">ACCIONES</th>
        </tr>
        <?php
            //! insertamos una estructura de tipo bucle para mostrar los registros
            while($columna=mysqli_fetch_array($resultado)){
                echo "<tr>";
                 //! Usar los mismos nombres y deo mismo formato al poner el nombre de las columnas
                echo "<td>".$columna['ci']."</td>"; 
                echo "<td>".$columna['nombre']."</td>";
                echo "<td>".$columna['ap_pat']."</td>";
                echo "<td>".$columna['ap_mat']."</td>";
                echo "<td>".$columna['fe_nac']."</td>";
                echo "<td>".$columna['tipo']."</td>";
                echo "<td>".$columna['departamento']."</td>";
                echo "<td>".$columna['email']."</td>";
                echo "<td>".$columna['contrasenia']."</td>";
                $id=$columna['ci'];
                $nom=$columna['nombre'];
                echo "<td>"."<a href='persona_cuentas.php?id=$id'>CUENTAS</a>"."</td>";
                echo "<td>"."<a href='persona_form_mod.php?id=$id'>CAMBIAR</a>"."</td>";
                echo "<td>"."<a href='persona_eliminar.php?id=$id'>ELIMINAR</a>"."</td>";
                echo "</tr>";
            }
        ?>
    </table>
    <form action="persona_form.php" method="request">
        <input type="submit" value="NUEVO CLIENTE">
    </form>
</body>
</html>
