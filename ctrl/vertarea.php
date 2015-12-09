<?php
/**
 * Controlador que se usa para obtener una lsita de las tareas asi como su paginacion
 */
if ($_SESSION['autenticado']=="SI")
	{
		include_once "/model/modelo.php";
		
		define ('PROXPAG',3);
		
		if (isset($_GET['pag']))
			$pag=$_GET['pag'];
		else
			$pag=1;
		
		$maxPag=((int) (NRegistros())/PROXPAG)+1;
		if ($pag<1 || $pag>$maxPag)
			$pag=1;
		
		$posIni=(($pag-1)*PROXPAG)+1;
		$listatar= array();
		$listatar=sacatareas($posIni);
		
		if (!$_POST)
		{
			include_once '/view/pre_vertareas.php';
		}
	}
	else 
		{
			include_once '/ctrl/sesion.php';
		}
?>
