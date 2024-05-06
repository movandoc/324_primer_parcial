<?php
include_once("conexion.php");
$existe_registro=false;
if (isset($_REQUEST["id"]) && !empty($_REQUEST["id"]) &&
    isset($_REQUEST["cuenta"]) && !empty($_REQUEST["cuenta"]) ){
    $existe_registro=true;
    $id_cliente=$_REQUEST["id"];
    $cuenta=$_REQUEST["cuenta"];
}

if($existe_registro){
    $consulta="DELETE FROM cuenta_bancaria where id_cliente='$id_cliente' and n_cuenta='$cuenta'";
    $resultado=mysqli_query($conn, $consulta) or die ("No se ha podido ejecutar la consulta");
    if($resultado){
        echo "Se ha realizado la eliminacion correctamente";
        echo "<form action='persona_cuentas.php' method='request'>";
        echo '<input type="hidden" name="id" value=<?php echo "$id_cliente"; ?>>';
        echo "<button type='submit'>VER LA CUENTA</button>";
        echo "</form>";
    }else{
        echo "No se ha realizado la cambiacion correctamente, revise, probablemente sea su culpa";
    }
}
?>