
<?php

include "configuracion.php";

// Conecta con servidor
$conexion=new mysqli($servidor, $usuario, $contraseña, $basededatos);
if (!$conexion->connect_errno){
  // Establece consulta SQL
  $consulta = "SELECT * FROM empleados";
  //Ejecutar una consulta SQL
  $resultados = $conexion->query($consulta);
  if ($resultados){ // Verifica resultado de la consulta SQL
  //Recupera cada registro y lo muestra mediante índices de nombre de campo
  while ($registro = $resultados->fetch_assoc()) {
    echo $registro['numEmpleado'] . " " . $registro['nombre'] . " " .$registro['edad'] .
    "<br/>";
  }
  echo "Numero de registros: $resultados->num_rows";
  $resultados->free(); // Libera recursos de la consulta
}else
  echo "Error en consulta:" . $conexion->error;
    $conexion->close(); // Libera la conexión al servidor
}else
  echo "Error al conectar con el servidor" . $conexion->connect_error;
?>
