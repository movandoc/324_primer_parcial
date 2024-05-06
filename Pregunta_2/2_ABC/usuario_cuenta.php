<?php
include_once("conexion.php");
//* MODIFICACION DE DATOS SEGUN EL ID
$id=$_REQUEST["id"];
//$nom=$_REQUEST["nom"];
$consulta="SELECT * FROM cuenta_bancaria where id_cliente='$id'";
$resultado=mysqli_query($conn, $consulta) or die ("No se ha podido ejecutar la consulta");
$columna=mysqli_fetch_array($resultado);

$consulta_nom="SELECT * FROM persona where ci='$id'";
$resultado_nom=mysqli_query($conn, $consulta_nom) or die ("No se ha podido ejecutar la consulta");
$columna_per=mysqli_fetch_array($resultado_nom);
$nom=$columna_per["nombre"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUS CUENTAS</title>
</head>
<body>
    <h1>Hola, <?php echo $nom;?></h1>
    <h2>TUS CUENTAS BANCARIAS:</h2>
    <table border="1">
        <tr>
            <th>NUMERO DE CUENTA</th>
            <th>TIPO</th>
            <th>SALDO</th>
            <th>DETALLES</th>
        </tr>
        <?php
            //! insertamos una estructura de tipo bucle para mostrar los registros
            while($columna=mysqli_fetch_array($resultado)){
                echo "<tr>";
                //! Usar los mismos nombres y deo mismo formato al poner el nombre de las columnas
                echo "<td>".$columna['n_cuenta']."</td>"; 
                echo "<td>".$columna['tipo']."</td>";
                echo "<td>".$columna['saldo']."</td>";
                $id=$columna['id_cliente'];
                echo "<td>"."<a href='transacciones.php?id=$id'>DETALLES</a>"."</td>";
                echo "</tr>";
            }
        ?>
    </table>


    
</body>
</html>
