<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nuevo Cliente</title>
</head>
<body>
    
<?php
    // Activa reporte de todo error que se presente
   include "config.php";
   try{
        // Crea conexión a la base de datos
        $conexion = new mysqli($servidor, $usuario, $contraseña, $basededatos);

        // Crea consulta preparada con 10 parametros
        $consultaSQL = 
            "INSERT INTO clientes (
                            nombre,
                            CURP, 
                            correo,
                            sexo, 
                            fechaNacimiento, 
                            escolaridad, 
                            credencialElector, 
                            actaNacimiento, 
                            comprobanteDomicilio, 
                            fotografia)
                               VALUES 
                            (?,?,?,?,?,?,?,?,?,?)";
    // esto faltaba 
    $comandoSQL = $conexion->prepare($consultaSQL);                    
    
    // obtenemos datos del formulario
        $nombre = $_POST['nombre'];
        $CURP = $_POST['CURP'];
        $correo = $_POST['correo'];
        $sexo = $_POST['sexo'];
        $fechaNacimiento = $_POST['fechaNacimiento'];
        $escolaridad = $_POST['escolaridad'];
        $credencial = isset($_POST['credencial'])? 1: 0 ;
        $acta = isset($_POST['acta'])? 1: 0 ;
        $comprobante = isset($_POST['comprobante'])? 1: 0 ;
        $foto = null;            

        

        $comandoSQL->bind_param("ssssssiiib", 
                                $nombre, $CURP, $correo, $sexo, $fechaNacimiento, 
                                $escolaridad, $credencial, $acta, $comprobante, $foto);            
                         

        $consultaSQL->send_long_data(9,file_get_contents($_FILES['foto']['tmp_name'])) ;           

        $comandoSQL->execute();            
        echo "Cliente registrado satisfactoriamente!!!";            
    }
    catch(Exception $e){
        echo "Error" . $e->getMessage(); 
        
    }
?>
</body>
</html>
