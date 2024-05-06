<?php
//TODO              CONEXION A LA BASE DE DATOS
    //*DATOS DE LA CONEXION   
    $servidor="localhost";
    $usuario="root";
    $password="";
    $basedatos="bdmarcelo";

    //!CREACION DE LA CONEXION A LA BASE DE DATOS => serv, user, psw
    $conn=mysqli_connect($servidor, $usuario, $password) 
        or die ("No se pudo establecer la conexion");
    
        //!CONSULTA A LA BASE DE DATOS
    $db=mysqli_select_db($conn, $basedatos) 
        or die("No se pudo conectar a la base de datos");
    
?>