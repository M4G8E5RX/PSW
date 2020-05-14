<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Cliente</title>
</head>
<body>

<h2>Borrar Cliente</h2>
    <hr/>
<?php include "encabezado.php"; ?>

<?php
    include "config.php";
    try{
        // Establecer conexion
        $conexion = new mysqli($servidor, 
                                $usuario, 
                                $contraseña, 
                                $basededatos);    
        // Crear consulta preparada
        $consultaSQL = "DELETE FROM clientes 
                            WHERE numCliente=?";

        $id = $_GET['id'];
        // preparamos consulta
        $comandoSQL = $conexion->prepare($consultaSQL);
        $comandoSQL->bind_param("i",$id);            
        //Ejecutamos consulta
        $comandoSQL->execute();
        echo "Cliente borrado satisfactoriamente!!!";    
    }
    catch(Exception $e){

        echo "Error: " . $e->getMessage();
    }
?>
</body>
</html>
