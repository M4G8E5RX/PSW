<!DOCTYPE html>
<html>
<head>
<title>Titulo</title>
</head>
<body  >

<h2>Nuevo cliente</h2>


<form  method='post' action='guardarCliente.php'  enctype="multipart/form-data" >

<fieldset style="width: 600px">	
<legend>Datos de identificación</legend>
<table >
		<tr>
			<td>Nombre:</td> 
			<td><input type="text" placeholder="Indique el nombre completo" required name="nombre"></td>
		</tr>

		<tr>
			<td>CURP:</td>
			<td><input type="text" placeholder="Escriba su clave unica" required name="CURP"></td>
		</tr>

		<tr>
			<td>Correo:</td>
			<td><input type="email" placeholder="Proporcione su e-mail" required name="correo"></td>
		</tr>

		<tr>
			<td>Sexo:</td>
			<td>
			    <input type="radio" name="sexo" checked value="F"> Femenino
				<input type="radio" name="sexo" value="M"> Masculino
			</td>
		</tr>

		<tr>
			<td>Fecha Nacimiento:</td>
			<td><input type="date" name="fechaNacimiento"></td>
		</tr>

		<tr>
			<td>Escolaridad:</td>
			<td>
				<select name='escolaridad'>
					<option value='Primaria' > Primaria </option>
					<option value='Secundaria' > Secundaria </option>
					<option value='Preparatoria' > Preparatoria </option>
					<option value='Licenciatura' > Licenciatura </option>
					<option value='Maestria' > Maestria </option>
					<option value='Doctorado' > Doctorado </option>	
				</select>	

			</td>
		</tr>
		<tr>
			<td rowspan="3">Documentos</td> <td><input type="checkbox" name="chkCredencialElector"> Credencial de elector</td> 
		</tr>
		<tr>
			<td><input type="checkbox" name="chkActaNacimiento"> Acta de nacimiento</td> 
		</tr>
		<tr>
			<td><input type="checkbox" name="chkComprobanteDomicilio"> Comprobante de domicilio</td>
		</tr>

		<tr>
			<td>Fotografia</td>
			<td><input type="file" accept="image/*" name="filFotografia"></td>
		</tr>

</table>

<input type="submit" value="Guardar">
</fieldset>	

</form>

</body>
</html>



