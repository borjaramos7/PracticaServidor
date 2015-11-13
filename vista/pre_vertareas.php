<?php include_once "../controlador/funpractica.php"; ?>
<!DOCTYPE html>
<HTML>
<head>
	<title>Lista de tareas</title>
	<meta charset="utf-8">
	<!-- necesario para bootstrap -->
	<link rel="stylesheet" type="text/css" 
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css"
	 href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	 
</head>
	<BODY>
	<h1>Lista de tareas</h1>
		<table border="">
			<tr>
				<td> ID </td>
				<td> Persona de contacto </td>
				<td> Descripcion </td>
				<td> Telefono cont. </td>
				<td> Correo </td>
				<td> Dirección </td>
				<td> Poblacion </td>
				<td> CP </td>
				<td> Provincia </td>
				<td> Estado </td>
				<td> F. de creación </td>
				<td> Operario </td>
				<td> F. de realización </td>
				<td> Anot. anteriores </td>
				<td> Anot. posteriores </td>

				<?php EscribelistaTarea($listatar) ?> 
			</tr>
		</table>
	</BODY>
</HTML>