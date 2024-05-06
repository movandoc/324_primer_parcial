<?php
include_once("conexion.php");
//$nom=$_REQUEST["nom"];
$consulta='select
sum(case when x.departamento="LA PAZ" then x.monto_total end) as LA_PAZ,
sum(case when x.departamento="COCHABAMBA" then x.monto_total end) as COCHABAMBA,
sum(case when x.departamento="SANTA CRUZ" then x.monto_total end) as SANTA_CRUZ,
sum(case when x.departamento="ORURO" then x.monto_total end) as ORURO,
sum(case when x.departamento="POTOSI" then x.monto_total end) as POTOSI,
sum(case when x.departamento="CHUQUISACA" then x.monto_total end) as CHUQUISACA,
sum(case when x.departamento="TARIJA" then x.monto_total end) as TARIJA,
sum(case when x.departamento="BENI" then x.monto_total end) as BENI,
sum(case when x.departamento="PANDO" then x.monto_total end) as PANDO
from(select tmp.departamento, sum(tmp.monto)as monto_total
    from (select DISTINCT departamento
            from persona
            where ci>10
            )as tpm, (SELECT p.nombre, p.departamento, cb.id_cliente, sum(cb.saldo) as monto
                        from cuenta_bancaria cb, persona p
                        where p.ci=cb.id_cliente
                        group by cb.id_cliente) as tmp
    where tmp.departamento = tpm.departamento
    group by tmp.departamento) as x';
$resultado=mysqli_query($conn, $consulta) or die ("No se ha podido ejecutar la consulta");
$columna=mysqli_fetch_array($resultado);

$lp=$columna['LA_PAZ'];
$cba=$columna['COCHABAMBA'];
$stc=$columna['SANTA_CRUZ'];
$oru=$columna['ORURO'];
$pt=$columna['POTOSI'];
$cqc=$columna['CHUQUISACA'];
$tar=$columna['TARIJA'];
$ben=$columna['BENI'];
$pnd=$columna['PANDO'];

if($lp==NULL)$lp=0;
if($cba==NULL)$cba=0;
if($stc==NULL)$stc=0;
if($oru==NULL)$oru=0;
if($pt==NULL)$pt=0;
if($cqc==NULL)$cqc=0;
if($tar==NULL)$tar=0;
if($ben==NULL)$ben=0;
if($pnd==NULL)$pnd=0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DRECTO</title>
</head>
<body>
    <h1>Hola, DIRECTOR</h1>
    <h2>LISTA DE MONTOS POR CUIDADES:</h2>
    <table border="1">
    <tr>
            <th>LA PAZ</th>
            <th>COCHABAMBA</th>
            <th>SANTA CRUZ</th>
            <th>ORURO</th>
            <th>POTOSI</th>
            <th>CHUQUISACA</th>
            <th>TARIJA</th>
            <th>BENI</th>
            <th>PANDO</th>
        </tr>
        <?php
            //! insertamos una estructura de tipo bucle para mostrar los registros
            echo "<tr>";
            echo "<td>".$lp."</td>"; 
            echo "<td>".$cba."</td>";
            echo "<td>".$stc."</td>";
            echo "<td>".$oru."</td>";
            echo "<td>".$pt."</td>";
            echo "<td>".$cqc."</td>";
            echo "<td>".$tar."</td>";
            echo "<td>".$ben."</td>";
            echo "<td>".$pnd."</td>";
            echo "</tr>";
        ?>
    </table>
    <form action="director_clientes.php" method="request">
        <input type="submit" value="VER USUARIOS">
    </form>
</body>
</html>
