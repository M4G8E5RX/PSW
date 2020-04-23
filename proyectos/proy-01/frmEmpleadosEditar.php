<html>
<body>
Edición de datos de empleado
<form action="empleadosActualizar.php" name="empleadosActualizar" method="post" >
<?php
  include ("configuracion.php");

session_start(); // Crea sesión
$conexion=new mysqli($servidor,$usuario, $contraseña, $basededatos);

if (!$conexion->connect_errno){ // Verifica conexión con el servidor
    $consulta = "SELECT * FROM empleados where numEmpleado=$_GET[numEmpleado]"; // Establece consulta SQL
    $resultado = $conexion->query($consulta); //Ejecuta consulta
    if($resultado){ // Verifica la ejecución de la consulta
        if($conexion->affected_rows>0){ // Verifica si existe el registro buscado
            $registro = $resultado->fetch_assoc(); // Recupera el registro
            // Crea variable de sesión que determina que registro se borrara
            $_SESSION['borrarNumEmpleado']=$_GET['NumEmpleado'];
            echo "Codigo: $registro[NumEmpleado]</br> <input type='hidden' name='numEmpleado' value=$registro[numEmpleado] >
            Nombre:<input type='text' name='nombre' value='$registro[nombre]' > <br/>
            Edad :<input type='text' name='edad' value=$registro[edad] > <br/>
            <input type='submit' value='Actualizar' />
            <a href='empleadoEliminar.php'> <input type='button' name='eliminar' value='Eliminar' /></a>";
        } else
            echo "No existe el registro";
        } else
            echo "Error en consulta:" . $conexion->error;
    } else
        echo "Error al conectar al servidor:" . $conexion->connect_error;

?>
</form>
</body>
</html>