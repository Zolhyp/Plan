<?php

$marca =$_POST['marca'];
$conexion = new mysqli("localhost","root","root", "SRB") or die("No se pudo establecer conexion");
$query="SELECT submarca FROM submarca where marca ='".$marca."'";
$resultado=$conexion->query($query);
if (!$resultado) {
    echo 'No se pudo ejecutar la consulta: ' . mysql_error();
    exit;
   	}
while ($row = $resultado->fetch_assoc()) {
    $html.="<option value = '".$row['submarca']."'>".$row['submarca']."</option>";
    }
echo $html;
?>