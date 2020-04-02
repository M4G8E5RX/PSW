<?php
mysqli_report(MYSQLI_REPORT_ALL); // Activa reporte de todo error que se presente
$servidor="localhost";
$usuario="root";
$contraseña="123456789";
$basededatos="nomina";

try{
// Crea conexión a la base de datos
$conexion = new mysqli($servidor,$usuario,$contraseña,$basededatos);
// Crea consulta preparada con 3 parametros
$consultaSQL = "INSERT INTO empleados (nombre, edad, sueldo) VALUES (?, ?, ?)";
$comandoSQL = $conexion->prepare($consultaSQL);
// Obtiene los valores del formulario
$nombre = $_GET['nombre'];
$edad = $_GET['edad'];
$sueldo = $_GET['sueldo'];
// Asigna valores a cada uno de los 3 parametro de la consulta
$comandoSQL->bind_param("sid", $nombre, $edad, $sueldo);
$comandoSQL->execute(); // Ejecuta consulta INSERT
echo "Cliente registrado con exito!!!";
} // fin try
catch(Exception $e){
echo "Error: " . $e->getMessage();
}
?>
