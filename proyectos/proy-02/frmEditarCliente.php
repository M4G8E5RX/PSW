<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Editar Cliente</title>
</head>
<body>
    <?php include "encabezado.php"; ?>
    <h2>Editar Cliente</h2>
    <hr/>
    <?php include "config.php"; 

    try{
        // Establecer conexion
        $conexion = new mysqli($servidor, 
                                $usuario, 
                                $contraseña, 
                                $basededatos);    
        // Crear consulta preparada
        $consultaSQL = "SELECT 
                            numCliente,
                            nombre,
                            CURP, 
                            correo,
                            fechaNacimiento,
                            sexo,
                            escolaridad, 
                            credencialElector, 
                            actaNacimiento, 
                            comprobanteDomicilio,  
                             fotografia 
                            FROM clientes 
                            WHERE numCliente=?";

        $id = $_GET['id'];
        // preparamos consulta
        $comandoSQL = $conexion->prepare($consultaSQL);
        $comandoSQL->bind_param("i",$id);            
        //Ejecutamos consulta
        $comandoSQL->execute();
        $comandoSQL->bind_result($numCliente, $nombre, 
        $CURP, $correo,$fechaNacimiento, 
        $sexo,$escolaridad, $credencial,
        $acta, $comprobante, $fotografia);
        $resultado = $comandoSQL->fetch();

        $femenino  = ($sexo == 'F')? 'checked': '';
        $masculino = ($sexo == 'M')? 'checked': '';
        $actachk = ($acta==1)?'checked':'';
        $comprobantechk = ($comprobante==1)?'checked':'';
        $credencialchk = ($credencial==1)?'checked':'';

        $fecha= date_create($fechaNacimiento);
        $fechaCorrecta = date_format($fecha, 'Y-m-d');

        if ($resultado==TRUE){
          
            $imagen = "data:image/jpeg;base64," . base64_encode($fotografia);    
           
            echo "<form action='actualizarCliente.php' method='post' enctype='multipart/form-data' >
            <fieldset >
             <legend>Datos de identificación</legend>   
            <table>
                <tr>
                    <td>Nombre </td><td><input value='$nombre' type='text' name='nombre' required></td>
                </tr>
                <tr>
                    <td>Correo </td><td><input value='$correo' type='email' name='correo' required></td>
                </tr>
                <tr>
                    <td>CURP </td><td><input type='text'value='$CURP' name='CURP' required></td>
                </tr>
                <tr>
                    <td>Genero</td>
                    <td><input type='radio' name='sexo' value='F' $femenino > Femenino
                        <input type='radio' name='sexo' value='M' $masculino > Masculino
                    </td>
                </tr>
                <tr>
                    <td>Fecha nacimiento</td>
                    <td><input type='date' value='$fechaCorrecta' name='fechaNacimiento'></td>
                </tr>
                <tr>
                    <td>Escolaridad</td>
                    <td>
                        <select name='escolaridad'>";

                        $opciones = array('Primaria', 'Secundaria',
                                          'Preparatoria', 'Licenciatura',
                                          'Posgrado'); 
                         for ($i=0; $i<count($opciones); $i++){ 
                            $sel = ($opciones[$i]==$escolaridad)?'selected':'';   
                            echo "<option value='$opciones[$i]' $sel >$opciones[$i] </option>";
                         }   

                echo "</select>    
                    </td>
                </tr>
                <tr>
                    <td>Credencial de Elector</td>
                    <td><input type='checkbox' $credencialchk  name='credencial'></td>
                </tr>
                <tr>
                    <td>Acta de nacimiento</td>
                    <td><input type='checkbox'$actachk name='acta'></td>
                </tr>
                <tr>
                    <td>Comprobante de domicilio</td>
                    <td><input type='checkbox' $comprobantechk name='comprobante'></td>
                </tr>
        
                <tr>
                    <td>Fotografia</td>
                    <td><img src='$imagen' width='120' > <input type='file' name='foto'></td>
                </tr>
                <tr>
                    <td><input type='submit' value='Enviar'></td>
                </tr>
            </table>
        
        </fieldset>
            
        </form>";

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