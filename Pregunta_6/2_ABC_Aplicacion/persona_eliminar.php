<?php
if (isset($_REQUEST["id"])){
    include_once("conexion.php");

    $id=$_REQUEST["id"];
    $consulta="DELETE FROM persona where ci='$id'";
    $consulta_delete_cuentas="DELETE FROM cuenta_bancaria where id_cliente='$id'";
    $resultado=mysqli_query($conn, $consulta) or die ("No se ha podido ejecutar la consulta");

    if($resultado){
        echo "Se ha realizado la eliminacion correctamente";
        echo "<form action='personas.php' method='request'>";
        echo "<button type='submit'>VER LOS REGISTROS</button>";
        echo "</form>";
    }else{
        echo "No se ha realizado la eliminacion correctamente, revise, probablemente sea su culpa";
    }
}
?>