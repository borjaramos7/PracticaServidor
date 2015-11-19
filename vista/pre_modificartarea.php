<?php include_once '../controlador/funpractica.php'; 
include_once '../modelo/modelo.php';
?>

<!DOCTYPE html>
<HTML>
<head>
	<title>Modifica los datos de la tarea</title>
	<meta charset="utf-8">
	<!-- necesario para bootstrap -->
	<link rel="stylesheet" type="text/css" 
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css"
	 href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
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
				
			  <div class="row">
			    <div class="col-md-1"><label for="percon">Contacto:</label></div>
			    <div class="col-md-1"><input name="percon" value="<?= sacauncampo($id,'persona_contacto')  ?>" 
			    type="text" class="form-control" id="percon" ></div>
			  </div><br>
			  <div class="row">
			  <div class="col-md-1"><label for="descrip">Descripcion</label><br></div>
			 <div class="col-md-2"><textarea name="descrip" 
			class="form-control" rows="3"><?= sacauncampo($id,'descripcion')  ?></textarea></div></div><br>
			
			<div class="form-group">
			    <label for="tlfn">Telefono de contacto:</label>
			    <input name="tlfn" type="text" value="<?= sacauncampo($id,'telefono_contacto')  ?>" 
			     class="form-control" id="tlfn" >
			  </div><br>
			  
			<div class="form-group">
   			<label for="email">Direccion de correo: </label>
    		<input name="email"  type="email" class="form-control" 
    		value="<?= sacauncampo($id,'correo')  ?>"  id="email" placeholder="Email">
  			</div><br>
  			
  			<div class="form-group">
			    <label for="direccion">Dirección:</label>
			    <input name="direccion" type="text" class="form-control" id="direccion" 
			    value="<?= sacauncampo($id,'direccion_jardin')  ?>" >
			</div><br>
			
			<label>Provincias: </label>
			<?= CreaSelect('pro',($provincias),$codipro) ?>
			<br><br>
			
			<div class="form-group">
			    <label for="pob">Poblacion:</label>
			    <input name="pob" type="text" class="form-control" id="pob"
			     value="<?= sacauncampo($id,'poblacion_jardin') ?>" >
			</div><br>
			<div class="form-group">
			    <label for="cp">Codigo postal:</label>
			    <input name="cp" type="text" value="<?= sacauncampo($id,'codigopos')  ?>"
			     class="form-control" id="cp" >
			</div><br>
							
			<div>
			<label for="estado">Estado:</label><br>
			<label class="radio-inline">
			  <input type="radio" name="estado" id="pendiente" value="P"  
			  checked="<?= compruebacheck('P',$id) ?>" >Pendiente
			</label>
			<label class="radio-inline">
			  <input type="radio" name="estado" id="realizada" value="R"
			  checked="<?= compruebacheck('R',$id) ?>" >Realizada
			</label>
			<label class="radio-inline">
			  <input type="radio" name="estado" id="cancelada" value="C"
			  checked="<?= compruebacheck('C',$id) ?>" >Cancelada
			</label>
			</div><br>
			
			<label>Fecha de creación: </label>
			<INPUT TYPE="date" NAME="fecha_cre" SIZE="20" readonly value="<?= sacauncampo($id,'fecha_creacion')  ?>">
			<br><br>
			
			<div class="form-group">
			    <label for="encargado">Nombre del operario encargado:</label>
			    <input name="encargado" type="text" class="form-control" 
			    id="encargado" value="<?= sacauncampo($id,'operario')  ?>">
			</div><br>
			
			<label>Fecha de realizacion: </label>
		   		<div class="well">
				  <div id="datetimepicker4" class="input-append">
				    <input data-format="yyyy-MM-dd" type="text"></input>
				    <span class="add-on">
				      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
				      </i>
				    </span>
				  </div>
				</div>
				<script type="text/javascript">
				  $(function() {
				    $('#datetimepicker4').datetimepicker({
				      pickTime: false
				    });
				  });
				</script>
			
			
			<label for="anoant">Anotaciones anteriores:</label><br>
			<textarea name="anoant" class="form-control" rows="3">
			<?=  sacauncampo($id,'anot_ant') ?>
			</textarea><br>
			
			<label for="anopos">Anotaciones posteriores:</label><br>
			<textarea name="anopos" class="form-control" rows="3">
			<?=  sacauncampo($id,'anot_post') ?>
			</textarea><br>
			
			   <input type="submit" value="Finalizar">
		   

		</FORM>
	</BODY>
</HTML>