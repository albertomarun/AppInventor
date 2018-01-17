<?php

DEFINE ('DBUSER', 'usuario');
DEFINE ('DBPW', 'clave');
DEFINE ('DBHOST', 'localhost');
DEFINE ('DBNAME', 'db_xxxx');

$dbc = mysqli_connect(DBHOST,DBUSER,DBPW);
if (!$dbc) {
    die("Error de conexion en Base de Datos: " . mysqli_error($dbc));
    exit();
}

$dbs = mysqli_select_db($dbc, DBNAME);
if (!$dbs) {
    die("Base de Datos no Existe: " . mysqli_error($dbc));
    exit();
}
 
$Codigo = mysqli_real_escape_string($dbc,$_GET['Codigo']);
$Nombre = mysqli_real_escape_string($dbc, $_GET['Nombre']);
$Cargo = mysqli_real_escape_string($dbc,$_GET['Cargo']);
$Telefono = mysqli_real_escape_string($dbc,$_GET['Telefono']);
$Correo = mysqli_real_escape_string($dbc,$_GET['Correo']);


$query = "UPDATE contacto SET Nombre='$Nombre', Cargo='$Cargo', Telefono='$Telefono', Correo='$Correo' WHERE Codigo='$Codigo'";
 
$result = mysqli_query($dbc, $query) or trigger_error("Error de MySQL: " . mysqli_error($dbc));
 
mysqli_close($dbc);
 
?>