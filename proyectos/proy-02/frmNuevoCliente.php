<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
</head>
<body>
    <?php include "encabezado.php"; ?>

    <h2>Nuevo Cliente</h2>
    <hr/>

    <form action='guardarCliente.php' method='post' enctype="multipart/form-data" >
    <fieldset >
     <legend>Datos de identificación</legend>   
    <table>
        <tr>
            <td>Nombre </td><td><input type='text' name='nombre' required></td>
        </tr>
        <tr>
            <td>Correo </td><td><input type='email' name='correo' required></td>
        </tr>
        <tr>
            <td>CURP </td><td><input type='text' name='CURP' required></td>
        </tr>
        <tr>
            <td>Genero</td>
            <td><input type='radio' name='sexo' value='F' checked > Femenino
                <input type='radio' name='sexo' value='M'  > Masculino
            </td>
        </tr>
        <tr>
            <td>Fecha nacimiento</td>
            <td><input type='date' name='fechaNacimiento'></td>
        </tr>
        <tr>
            <td>Escolaridad</td>
            <td>
                <select name='escolaridad'>
                    <option value='Primaria'>Primaria</option>
                    <option value='Secundaria'>Secundaria</option>
                    <option value='Preparatoria'>Preparatoria</option>
                    <option value='Licenciatura'>Licenciatura</option>
                    <option value='Posgrado'>Progrado</option>
                </select>    
            </td>
        </tr>
        <tr>
            <td>Credencial de Elector</td>
            <td><input type='checkbox' name='credencial'></td>
        </tr>
        <tr>
            <td>Acta de nacimiento</td>
            <td><input type='checkbox' name='acta'></td>
        </tr>
        <tr>
            <td>Comprobante de domicilio</td>
            <td><input type='checkbox' name='comprobante'></td>
        </tr>

        <tr>
            <td>Fotografia</td>
            <td><input type='file' name='foto'></td>
        </tr>
        <tr>
            <td><input type='submit' value='Enviar'></td>
        </tr>
    </table>

</fieldset>
    
</form>
    
</body>
</html>