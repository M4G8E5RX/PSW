<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
mysqli_report(MYSQLI_REPORT_ALL); // Activa reporte de todo error que se presente
include "config.php";
try{
	session_start();

	// Crea conexión a la base de datos
	$conexion = new mysqli($servidor,$usuario,$contraseña,$basededatos);
	
	// Crea consulta preparada con 9 parametros
	$consultaSQL = "INSERT INTO clientes (nombre, CURP, correo, 
										 sexo, fechaNacimiento, escolaridad,
										 credencialElector, actaNacimiento, comprobanteDomicilio, fotografia)
										  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

	$comandoSQL = $conexion->prepare($consultaSQL);
	
	// Obtiene los valores del formulario
	$nombre = $_POST['nombre'];
	$CURP = $_POST['CURP'];
	$correo = $_POST['correo'];
	$sexo = $_POST['sexo'];
	$fechaNacimiento = $_POST['fechaNacimiento'];
	$escolaridad = $_POST['escolaridad'];
	$credencialElector = isset($_POST['chkCredencialElector'])? 1 : 0 ;
	$actaNacimiento = isset($_POST['chkActaNacimiento'])? 1 : 0 ;
	$comprobanteDomicilio = isset($_POST['chkComprobanteDomicilio'])? 1 : 0 ;
	$fotografia = null;
	//Asigna valores a cada uno de los 9 parametro de la consulta
	
	$comandoSQL->bind_param("ssssssiiib", $nombre, $CURP, $correo, $sexo, $fechaNacimiento, 
						$escolaridad, $credencialElector, $actaNacimiento, $comprobanteDomicilio, $fotografia);
	
	$comandoSQL->send_long_data(9, file_get_contents($_FILES['filFotografia']['tmp_name']));

	$comandoSQL->execute(); // Ejecuta consulta INSERT
	
	 echo "Cliente registrado con exito!!!";
        echo "<a href='index.html'>ir a menu </a>";

	} // fin try
	
	catch(Exception $e){
		echo "Error: " . $e->getMessage();
        echo "<a href='index.html'>ir a menu </a>";

}
?>





</body>
</html>