<?php
include_once("conexion.php");
$existe_registro=false;
    if (isset($_REQUEST["ci"]) && !empty($_REQUEST["ci"]) &&
        isset($_REQUEST["nombre"]) && !empty($_REQUEST["nombre"]) &&
        isset($_REQUEST["ap_pat"]) && !empty($_REQUEST["ap_pat"]) &&
        isset($_REQUEST["ap_mat"]) && !empty($_REQUEST["ap_mat"]) &&
        isset($_REQUEST["date"]) && !empty($_REQUEST["date"]) &&
        isset($_REQUEST["tipo"]) && !empty($_REQUEST["tipo"]) &&
        isset($_REQUEST["email"]) && !empty($_REQUEST["email"]) &&
        isset($_REQUEST["depto"]) && !empty($_REQUEST["depto"]) &&
        isset($_REQUEST["psw"]) && !empty($_REQUEST["psw"])
    ){
        $id_cliente=$_REQUEST["ci"];
        $nombre=$_REQUEST["nombre"];
        $ap_pat=$_REQUEST["ap_pat"];
        $ap_mat=$_REQUEST["ap_mat"];
        $tipo=$_REQUEST["tipo"];
        $fecha_nac=$_REQUEST["date"];
        $email=$_REQUEST["email"];
        $depto=$_REQUEST["depto"];
        $psw=$_REQUEST["psw"];

        $existe_registro=true;
    }

    //todo ACTUALIZAR: UPDATE
    if($existe_registro){
        $consulta="UPDATE persona SET nombre='$nombre', ap_pat='$ap_pat', ap_mat='$ap_mat', 
                        fe_nac='$fecha_nac', tipo='$tipo', email='$email', departamento='$depto', contrasenia='$psw'
                    where ci='$id_cliente'";
        $resultado=mysqli_query($conn, $consulta) or die ("No se logro registrar");
        if($resultado){
            echo "Se ha realizado la cambiacion correctamente";
        }else{
            echo "No se ha realizado la cambiacion correctamente, revise, probablemente sea su culpa";
        }
    }
?>

<html>
    <p>Cambios realizados.</p>
    <form action="personas.php" method="post">
        <input type="submit" value="IR A LA LISTA DE CLIENTES">
    </form>
</html>