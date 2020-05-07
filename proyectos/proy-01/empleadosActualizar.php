<?php
 include ("configuracion.php");
// Conecta con servidor
$conexion=new mysqli($servidor,$usuario, $contraseña, $basededatos);
if (!$conexion->connect_errno ) { // Verifica error de conexión
    $nombre= $_POST['nombre']; // Recupera valores para actualización
    $edad = $_POST['edad'];
    $numEmp= $_POST['numEmpleado'];
    // Establece consulta SQL
    $consulta = "UPDATE empleados SET nombre='$nombre', edad=$edad where numEmpleado=$numEmp";
    echo $consulta;
    $resultados = $conexion->query($consulta); // Ejecuta consulta
    if ($resultados) // Verifica si la consulta fue correcta
        header("Location: EmpleadosReporte.php"); // Reenvía al la pagina de Reporte
    else{
         echo "Error al Actualizar Registro: $conexion->error";
        $conexion->close();
    }
}else
    echo "Error al conectar al servidor: $conexion->connect_error";
?>