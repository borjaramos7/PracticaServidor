<?php include_once '/ctrl/funpractica.php'; ?>
<!DOCTYPE html>
<HTML>
<head>
	<title>Introduce los datos de tu tarea</title>
	<meta charset="utf-8">

</head>
	<BODY>
		<h1>Introduce los datos de la tarea</h1><br>
		
		<!-- Muestra los errores -->
		<?php if ($hayError ) :?>
			<div style="border: 1px solid #ccc; color: red"><ul>
			<?php foreach($errores as $textoError) {
				echo "<li>".$textoError."</li>";
			}
			?>
			</ul></div>
		<?php endif;?>
		<form class="form-inline" METHOD="POST">
		<table >
			<tr>
				<td><label for="percon">Contacto:</label></td>
				<td> <input name="percon" value="<?=  ValorPost('percon') ?>" 
			    type="text" class="form-control" id="percon" >
			    </td>
			</tr>
			<tr>
				<td> <label for="descrip">Descripcion</label></td>
				<td><textarea name="descrip" 
					class="form-control" rows="3"><?=  ValorPost('descrip') ?></textarea>
			    </td>
			</tr>
			<tr>
				<td><label for="tlfn">Telefono de contacto:</label></td>
				<td><input name="tlfn" type="text" value="<?=  ValorPost('tlfn') ?>" 
			     class="form-control" id="tlfn" >
			    </td>
			</tr>
			<tr>
				<td><label for="email">Direccion de correo: </label></td>
				<td><input name="email"  type="email" class="form-control" 
    		value="<?=  ValorPost('email') ?>"  id="email" placeholder="Email">
			    </td>
			</tr>
			<tr>
				<td><label for="direccion">Dirección:</label></td>
				<td><input name="direccion" type="text" class="form-control" id="direccion" 
			    value="<?=  ValorPost('direccion') ?>" >
			    </td>
			</tr>
			<tr>
				<td><label>Provincias: </label></td>
				<td><?= CreaSelect('pro',($provincias),ValorPost('pro')) ?>
			    </td>
			</tr>
			<tr>
				<td><label for="pob">Poblacion:</label></td>
				<td><input name="pob" type="text" class="form-control" id="pob" 
			    value="<?=  ValorPost('pob') ?>">
			    </td>
			</tr>
			<tr>
				<td><label for="cp">Codigo postal:</label></td>
				<td><input name="cp" type="text" value="<?=  ValorPost('cp') ?>" 
			     class="form-control" id="cp" >
			    </td>
			</tr>
			<tr>
				<td><label for="estado">Estado:</label></td>
				<td>
					<label class="radio-inline">
					  <input type="radio" name="estado" id="pendiente" value="P">Pendiente
					</label>
					<label class="radio-inline">
					  <input type="radio" name="estado" id="realizada" value="R">Realizada
					</label>
					<label class="radio-inline">
					  <input type="radio" name="estado" id="cancelada" value="C">Cancelada
					</label>
			    </td>
			</tr>
			<tr>
				<td><label for="encargado">Operario encargado:</label></td>
				<td><input name="encargado" type="text" class="form-control" id="encargado" 
				value="<?=  ValorPost('encargado') ?>" >
			    </td>
			</tr>
			<tr>
				<td><label for="fecharea">Fecha realizacion</label></td>
				<td>
				<input name="fecharea" type="text" class="form-control" id="fecharea" 
				value="<?=  ValorPost('fecharea') ?>">
			    </td>
			</tr>
			<tr>
				<td><label for="anoant">Anotaciones anteriores:</label></td>
				<td>
				<textarea name="anoant" class="form-control" rows="3"><?=  ValorPost('anoant') ?>
				</textarea><br>
			    </td>
			</tr>
			<tr>
			<td><input class="btn btn-primary" type="submit" value="Finalizar"><td>
			</tr>
		</table>
			   
		   

		</FORM>
	</BODY>
</HTML>