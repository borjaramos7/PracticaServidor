<?php
include_once '../install/cBBDD.php';

function conprovincias()
{
	$bd=database::getInstance();
	$query ='SELECT pro.cod, pro.nombre FROM tareas.tbl_provincias pro';
	$resu=array();
	$resu=$bd->Consulta($query);
	
	while ($line = mysqli_fetch_array($resu,MYSQL_ASSOC))
	{
		$provincias[$line['cod']]=$line['nombre'];
	}
	return $provincias;
}

function insertatarea($tarea)
{
	$bd=database::getInstance();
	$bd->insertar('tarea',$tarea);
}

function sacatareas ()
{
	$bd=database::getInstance();
	$query ='SELECT * FROM tareas.tarea';
	$resu=array();
	$resu=$bd->Consulta($query);
	
	while ($line = $bd->LeeRegistro($resu))
	{
		$tareas[]=$line;
	}
	return $tareas;
}

function consiguepro($var)
{
	$provincia=array();
	
	$bd=database::getInstance();
	$query ='SELECT pro.nombre FROM tareas.tbl_provincias pro where pro.cod='.$var;
	$resu=$bd->Consulta($query);
	$provincia = $bd->LeeRegistro($resu);
	return $provincia['nombre'];
}

function borratarea($id)
{
	$bd=database::getInstance();
	$bd->BorraunRegistro('tarea',$id,'id');
}

function modificatarea($id)
{
	$bd=database::getInstance();
	$bd->ModificaRegistros('tarea',$id,'id');
}

?>

