<?php
    // Activa reporte de todo error que se presente
    mysqli_report(MYSQLI_REPORT_ALL);
    include "config.php";
    try{
        // Crea conexión a la base de datos
        $conexion = new mysqli($servidor, $usuario, $contraseña, $basededatos);

        // Crea consulta preparada con 3 parametros
        $consultaSQL = 
            "INSERT INTO clientes (
                            nombre,
                            correo,
                            CURP, 
                            sexo, 
                            fechaNacimiento, 
                            escolaridad, 
                            credenciaElector, 
                            actaNacimiento, 
                            comprobanteDomicilio, 
                            fotografia)
                               VALUES 
                            (?,?,?,?,?,?,?,?,?,?)";

    }
    catch(){

        
    }







?>