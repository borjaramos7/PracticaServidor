<?php
/**
 * Este controlador en caso de no recibir post redirecciona a la vista que te pregunta 
 * si estas seguro de borrar la tarea que acabas de selecionar, cuando reciba datos de
 * esa vista se encarga de borrar y redirecionar a la lista de tareas.
 */
if ($_SESSION['autenticado']=="SI")
{
	include_once '/model/modelo.php';
	if (!$_POST)
		include_once '/view/pre_borrar.php';
	else
	{ 
		if ($_POST['borrado']=='si')
		borratarea($_GET['id']);
		header("Location:?ctrl=vertarea");
		include_once '/ctrl/vertarea.php';
	}
}
else
{
	include_once '/ctrl/sesion.php';
}
	