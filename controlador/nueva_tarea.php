<?php
include_once "../modelo/modelo.php";
include_once "funpractica.php";
$fechacreacion = date('Y-m-d');

$provincias=array();
$provincias=conprovincias();

$hayError=false;
if (! $_POST)
{
	include_once '../vista/pre_nuevatarea.php';
}
else
{
	$patrontlfn = "/[0-9]/";
	$patroncp = "/[0-9]{5}/";
	

	if (! isset($_POST['percon']) || $_POST['percon']=='')
	{ // Persona de contacto vacio
		$errores['percon']='Debes introducir una persona de contacto';
		$hayError=TRUE;
	}

	if (! isset($_POST['descrip']) || $_POST['descrip']=='')
	{ // Tarea sin descripcion
		$errores['descrip']='Debes introducir una pequeña descripcion de la tarea';
		$hayError=TRUE;
	}

	if (! isset($_POST['tlfn']) || ! preg_match($patrontlfn,$_POST['tlfn'])) //patron verdadero si coincide
	{ // telefono vacio o caracteres invalidos
		$errores['tlfn']='El telefono no puede estar vacio o contener caracteres invalidos';
		$hayError=TRUE;
	}
	
	//El correo en formato correcto lo filtra bootstrp
	
	if (! isset($_POST['email']) || $_POST['email']=='')
	{ // email vacio
	$errores['email']='El email no puede estar vacio';
	$hayError=TRUE;
	}
	
	if (! isset($_POST['cp']) || ! preg_match($patroncp,$_POST['cp'])) //patron verdadero si coincide
	{ // telefono vacio o caracteres invalidos
	$errores['cp']='El codigo postal no puede estar vacio, contener caracteres invalidos o mas 5 numeros';
	$hayError=TRUE;
	}
	
	if (! isset($_POST['estado']))
	{ // No tiene estado
	$errores['cp']='La tarea tiene que tener un estado';
	$hayError=TRUE;
	}
	
	
	if ($hayError)
	{ // Hay error
		include_once '../vista/pre_nuevatarea.php';
	}
	else
	{
		$tarea=array();
		/*Falta fecha realizacion */
		$tarea=creaarraytarea($_POST['percon'], $_POST['descrip'], $_POST['tlfn'],
				 $_POST['email'], $_POST['direccion'], $_POST['pob'],
				 $_POST['cp'],$_POST['pro'], $_POST['estado'], $_POST['encargado'],
				$_POST['anoant'], $_POST['anopos']);

		insertatarea($tarea);
		
		
		
	}
}
?>