<?php include_once "/ctrl/funpractica.php"; ?>
<?php include_once "/model/modelo.php"; ?>
<!DOCTYPE html>
<HTML>
<head>
	<title>Lista de tareas</title>
	<meta charset="utf-8">
</head>
	<BODY>
	<h1>Lista de tareas: <?=NRegistros() ?> elementos</h1>
		<table  class="table table-bordered">
			<tr class="success">
				<td > ID </td>
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
				<td> Anot. posteriores </td></tr>

				<?php EscribelistaTarea($listatar) ?> 
			
		</table>
		
		<P>
		<?php  if ($pag>1) : ?> 
			<a href="?ctrl=vertarea&pag=1" class="btn btn-info" >Principio</a>
		<?php endif;?>
		<?php if ($pag>1): ?>
			<a href="?ctrl=vertarea&pag=<?=$pag-1?>" class="btn btn-info" >Anterior </a>
		<?php endif; ?>
		<?php if ($pag<$maxPag-1) :?> 
			<a href="?ctrl=vertarea&pag=<?=$pag+1?>" class="btn btn-info" >Siguiente</a>
		<?php endif;?>
		<?php if ($pag<$maxPag-1) :?> 
			<a href="?ctrl=vertarea&pag=<?= ceil($maxPag-1)?>" class="btn btn-info" >Final</a>
		<?php endif;?>
		</P>
		<label>Pagina: <?php echo $pag ;?>  </label>
	</BODY>
</HTML>