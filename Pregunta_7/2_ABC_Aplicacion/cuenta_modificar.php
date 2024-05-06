<?php
include_once("conexion.php");
$existe_registro=false;
    if (isset($_REQUEST["id_cliente"]) && !empty($_REQUEST["id_cliente"]) &&
        isset($_REQUEST["n_cuenta"]) && !empty($_REQUEST["n_cuenta"]) &&
        isset($_REQUEST["tipo"]) && !empty($_REQUEST["tipo"]) &&
        isset($_REQUEST["saldo"]) && !empty($_REQUEST["saldo"])
    ){
        $id_cliente=$_REQUEST["id_cliente"];
        $n_cuenta=$_REQUEST["n_cuenta"];
        $tipo=$_REQUEST["tipo"];
        $saldo=$_REQUEST["saldo"];

        $existe_registro=true;
    }

    //todo ACTUALIZAR: UPDATE
    if($existe_registro){
        $consulta="UPDATE cuenta_bancaria SET tipo='$tipo', saldo='$saldo' 
                    where id_cliente='$id_cliente' and n_cuenta='$n_cuenta'";
        $resultado=mysqli_query($conn, $consulta) or die ("No se logro actualizar");
        if($resultado){
            echo "Se ha realizado la cambiacion correctamente";
        }else{
            echo "No se ha realizado la cambiacion correctamente, revise, probablemente sea su culpa";
        }
    }
?>

<html>
    <form action="persona_cuentas.php" method="post">
        <input type="hidden" name="id" value=<?php echo $id_cliente; ?> >
        <input type="submit" value="IR A LA LISTA DE CLIENTES">
    </form>
</html>