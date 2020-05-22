<!DOCTYPE html>
<html lang="en">
<head>
    <title>ACtualizar Cliente</title>
</head>
<body>
    <?php include "encabezado.php"; ?>
    
    <h2>Actualizar Cliente</h2>
    <hr/> 

<?php
    // Activa reporte de todo error que se presente
   include "config.php";
   try{
        // Crea conexión a la base de datos
        $conexion = new mysqli($servidor, $usuario, $contraseña, $basededatos);

        // Crea consulta preparada con 10 parametros
        $consultaSQLconFoto = 
            "UPDATE clientes SET
                            nombre=?,
                            CURP=?, 
                            correo=?,
                            sexo=?, 
                            fechaNacimiento=?, 
                            escolaridad=?, 
                            credencialElector=?, 
                            actaNacimiento=?, 
                            comprobanteDomicilio=?, 
                            fotografia=?  WHERE numCliente=?";
   
        $consultaSQLsinFoto = 
            "UPDATE clientes SET
                            nombre=?,
                            CURP=?, 
                            correo=?,
                            sexo=?, 
                            fechaNacimiento=?, 
                            escolaridad=?, 
                            credencialElector=?, 
                            actaNacimiento=?, 
                            comprobanteDomicilio=?
                            WHERE numCliente=?";
   
        // obtenemos datos del formulario
        $numCliente = $_POST['numCliente']; 
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

        
        if ($_FILES['foto']['size']>0){
            $comandoSQL = $conexion->prepare($consultaSQLconFoto);                    
            $comandoSQL->bind_param("ssssssiiibi", 
                                $nombre, $CURP, $correo, $sexo, $fechaNacimiento, 
                                $escolaridad, $credencial, $acta, $comprobante, $foto, $numCliente);            
            $comandoSQL->send_long_data(9,file_get_contents($_FILES['foto']['tmp_name'])) ;           
        }
        else{
            $comandoSQL = $conexion->prepare($consultaSQLsinFoto);                        
            $comandoSQL->bind_param("ssssssiiii", 
            $nombre, $CURP, $correo, $sexo, $fechaNacimiento, 
            $escolaridad, $credencial, $acta, $comprobante, $numCliente);            

        }
        $comandoSQL->execute();            
        echo "Cliente Actualizado satisfactoriamente!!!";            
    }
    catch(Exception $e){
       echo "Error" . $e->getMessage(); 
    }
?>
</body>
</html>
