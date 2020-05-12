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
                            FROM clientes WHERE numCliente=?";

        $id = $_GET['id'];
        echo $consultaSQL;
        // preparamos consulta
        $comandoSQL = $conexion->prepare($consultaSQL);
        $comandoSQL->bind_param("i",$id);            
        //Ejecutamos consulta
        $comandoSQL->execute();

        $resultado = $comandoSQL->fetch();

        if ($resultado==TRUE){
            $comandoSQL->bind_result($numCliente, $nombre, 
                                 $CURP, $correo, 
                                 $sexo, $fotografia);
          
            $imagen = "data:image/jpeg;base64," . base64_encode($fotografia);    
           
            echo "<table>";
            echo "<tr>
                    <td>ID</td><td>$numCliente</td>
                </tr>";
            echo "<tr>
                    <td>Nombre</td><td>$nombre</td>
                </tr>";
            echo "<tr>
                    <td>CURP</td><td>$CURP</td>
                </tr>";
            echo "<tr>
                <td>Fotografia</td><td><img src='$imagen' whith='120'></td>
            </tr>";

            echo "</table>";
  

        }
        else
            echo "Cliente no existe!!!";
    }
    catch(Exception $e){

        echo "Error: " . $e->getMessage();
    }
?>
</body>
</html>
