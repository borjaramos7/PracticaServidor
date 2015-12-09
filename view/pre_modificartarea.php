<?php include_once '/ctrl/funpractica.php'; 
include_once '/model/modelo.php';
?>

<!DOCTYPE html>
<HTML>
<head>
	<title>Modifica los datos de la tarea</title>
	<meta charset="utf-8">
</head>
	<BODY>
		<h1>Modifica los datos de la tarea <?= $id ?></h1><br>
		
		<!-- Muestra los errores -->
		<?php if ($hayError ) :?>
			<div style="border: 1px solid #ccc; color: red"><ul>
			<?php foreach($errores as $textoError) {
				echo "<li>".$textoError."</li>";
			}
			?>
			</ul></div>
		<?php endif;?>
		
		<!-- Formulario para introducir nuevas tareas -->
		<form class="form-inline" ACTION="" METHOD="POST">
		<table>
			<tr>
				<td><label for="percon">Contacto:</label></td>
				<td> <input name="percon" value="<?= sacauncampo($id,'persona_contacto')  ?>" 
			    type="text" class="form-control" id="percon" >
			    </td>
			</tr>
			<tr>
				<td> <label for="descrip">Descripcion</label></td>
				<td><textarea name="descrip" 
					class="form-control" rows="3"><?= sacauncampo($id,'descripcion')  ?></textarea>
			    </td>
			</tr>
			<tr>
				<td><label for="tlfn">Telefono de contacto:</label></td>
				<td><input name="tlfn" type="text" value="<?= sacauncampo($id,'telefono_contacto')  ?>"
			     class="form-control" id="tlfn" >
			    </td>
			</tr>
			<tr>
				<td><label for="email">Direccion de correo: </label></td>
				<td><input name="email"  type="email" class="form-control" 
    				value="<?= sacauncampo($id,'correo')  ?>"  id="email" placeholder="Email">
			    </td>
			</tr>
			<tr>
				<td><label for="direccion">Dirección:</label></td>
				<td><input name="direccion" type="text" class="form-control" id="direccion" 
			    value="<?= sacauncampo($id,'direccion_jardin')  ?>" >
			    </td>
			</tr>
			<tr>
				<td><label>Provincias: </label></td>
				<td><?= CreaSelect('pro',($provincias),$codipro) ?>
			    </td>
			</tr>
			<tr>
				<td><label for="pob">Poblacion:</label></td>
				<td><input name="pob" type="text" class="form-control" id="pob" 
			    value="<?= sacauncampo($id,'poblacion_jardin') ?>">
			    </td>
			</tr>
			<tr>
				<td><label for="cp">Codigo postal:</label></td>
				<td><input name="cp" type="text" value="<?= sacauncampo($id,'codigopos')  ?>" 
			     class="form-control" id="cp" >
			    </td>
			</tr>
			<tr>
				<td><label for="estado">Estado:</label></td>
				<td>
					<label class="radio-inline">
					  <input type="radio" name="estado" id="pendiente" value="P"  
					 <?= compruebacheck('P',$id,'estado_tarea') ?> >Pendiente
					</label>
					<label class="radio-inline">
					  <input type="radio" name="estado" id="realizada" value="R"
					 <?= compruebacheck('R',$id,'estado_tarea') ?> >Realizada
					</label>
					<label class="radio-inline">
					  <input type="radio" name="estado" id="cancelada" value="C"
					 <?= compruebacheck('C',$id,'estado_tarea') ?>>Cancelada
					</label>
			    </td>
			</tr>
			<tr>
				<td><label for="encargado">Operario encargado:</label></td>
				<td><input name="encargado" type="text" class="form-control" id="encargado" 
				value="<?= sacauncampo($id,'operario')  ?>" >
			    </td>
			</tr>
			<tr>
				<td><label for="fecharea">Fecha realizacion</label></td>
				<td>
				<input name="fecharea" type="text" class="form-control" id="fecharea" 
				value="<?=  sacauncampo($id, 'fecha_realizacion') ?>" placeholder="DD/MM/AAAA">
			    </td>
			</tr>
			<tr>
				<td><label for="anoant">Anotaciones anteriores:</label></td>
				<td>
				<textarea name="anoant" class="form-control" rows="3">
				<?=  sacauncampo($id,'anot_ant') ?></textarea><br>
			    </td>
			</tr>
			<tr>
				<td><label for="anoant">Anotaciones Posteriores:</label></td>
				<td>
				<textarea name="anopos" class="form-control" rows="3">
				<?=  sacauncampo($id,'anot_post') ?></textarea><br>
			    </td>
			</tr>
			<tr>
			<td><input class="btn btn-primary" type="submit" value="Finalizar"><td>
			</tr>
		</table>
		
		
		</FORM>
	</BODY>
</HTML>