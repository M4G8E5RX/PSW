<?php
mysqli_report(MYSQLI_REPORT_ALL); // Activa reporte de todo error que se presente

try{
  include ("configuracion.php");



// Establece la conexion el servidor
$conexion = new mysqli($servidor,$usuario,$contraseña,$basededatos);

// Crea consulta preparada
$consultaSQL = "SELECT numEmpleado, nombre, edad, sueldo FROM empleados WHERE numEmpleado=?";
$comandoSQL = $conexion->prepare($consultaSQL);

// Obtiene los valores del formulario
$numEmpleado = $_GET['numEmpleado'];

// Asigna valores a cada parametro de la consulta
$comandoSQL->bind_param("i", $numEmpleado);

// Ejecuta consulta
$comandoSQL->execute();

// Establece las variables para obtener los datos
$comandoSQL->bind_result($numEmpleado, $nombre, $edad, $saldo);
$resultado = $comandoSQL->fetch(); // obtiene los datos
if ($resultado==true){
echo "<fieldset style='width:200'>";
echo "<table>";
echo "<tr>";
echo "<td>Nombre: </td> <td> $nombre </td>";
echo "</tr>";
echo "<tr>";
echo "<td>Edad:</td> <td> $edad </td>";
echo "</tr>";
echo "<tr>";
echo "<td>Saldo:</td> <td> $$saldo </td>";
echo "</tr>";
echo "</tr>";
echo "</table>";
echo "</fieldset>";
}
else
echo "Cliente no existe!!!";
}
catch(Exception $e){
echo "Error: " . $e->getMessage();
}
?>
