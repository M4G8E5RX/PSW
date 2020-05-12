<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    include "config.php";
    try{
        // Establecer conexion
        $conexion = new mysqli($servidor, $usuario, $contraseña, $basededatos);    
        // Crear consulta preparada
        $consultaSQL = "SELECT 
                            numCliente, nombre, 
                            CURP, correo, 
                            sexo, fotografia
                            FROM clientes";
        // preparamos consulta
        $comandoSQL = $conexion->prepare($consultaSQL);
        //Ejecutamos consulta
        $comandoSQL->execute();
        $comandoSQL->bind_result($numCliente, $nombre, 
                                 $CURP, $correo, 
                                 $sexo, $fotografia);
        echo "<table>"; // encabezado de la tabla
        echo "<tr>
            <th>ID</th><th>Nombre</th>
            <th>CURP</th><th>Correo</th>
            <th>Sexo</th><th>Fotografia</th></tr>";                             

        while ($comandoSQL->fetch()){
            $imagen = "data:image/jpeg;base64," . base64_encode($fotografia);    
            echo "<tr>
                   <td>$numCliente</td> <td>$nombre</td> 
                   <td>$CURP</td><td>$correo</td>
                   <td>$sexo</td><td><img src='$imagen' width ='120'></td>
                   </tr>";
        }    
        echo "</table>";
    }
    catch(Exception $e){

        echo "Error: " . $e->getMessage();

    }

?>

</body>
</html>