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
                            correo,
                            CURP, 
                            sexo, 
                            fechaNacimiento, 
                            escolaridad, 
                            credencialElector, 
                            actaNacimiento, 
                            comprobanteDomicilio, 
                            fotografia)
                               VALUES 
                            (?,?,?,?,?,?,?,?,?,?)";
    // obtenemos datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $CURP = $_POST['CURP'];
    $sexo = $_POST['sexo'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $escolaridad = $_POST['escolaridad'];
    $credencial = isset($_POST['credencial'])? 1: 0 ;
    $acta = isset($_POST['acta'])? 1: 0 ;
    $comprobante = isset($_POST['comprobante'])? 1: 0 ;
    $foto = null;            

    $consultaSQL->bind_param("ssssssiiib", 
                            $nombre, $correo, $CURP, $sexo, $fechaNacimiento, 
                            $escolaridad, $credencial, $acta, $comprobante, $foto);            
    $consultaSQL->send_long_data(9,file_get_contents($_FILES['foto']['tmp_name'])) ;           

    $consultaSQL->execute();            
    echo "Cliente registrado satisfactoriamente!!!";            
    }
    catch(Exception $e){
        echo "Error" . $e->getMessage(); 
        
    }







?>