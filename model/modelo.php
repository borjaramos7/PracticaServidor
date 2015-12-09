<?php
include_once '/install/cBBDD.php';

/**
 * Saca a traves de la BBDD un array con las provincias
 * @return $provincias
 */
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

/**
 * Recibe un array con las tareas y las inserta en BBDD a traves de la capa de abstracion.
 * @param unknown $tarea
 */
function insertatarea($tarea)
{
	$bd=database::getInstance();
	$bd->insertar('tarea',$tarea);
}

/**
 * Recibe la posicion de inicio para la paginacion y saca la lista de tareas
 * @param unknown $posIni
 */
function sacatareas ($posIni)
{
	$bd=database::getInstance();
	$query ="SELECT * FROM tareas.tarea LIMIT ".($posIni-1).",".PROXPAG;
	$resu=array();
	$resu=$bd->Consulta($query);
	
	while ($line = $bd->LeeRegistro($resu))
	{
		$tareas[]=$line;
	}
	return $tareas;
}
/**
 * Funcion que recibe unos parametros y un campo donde buscarlos para realizar una busqueda 
 * dentro de nuestra BBDD
 * 
 * @param unknown $campo
 * @param unknown $parametro
 * @param unknown $posIni
 */
function filtratareas ($campo,$parametro,$posIni)
{
	$tareas=array();
	
	$bd=database::getInstance();
	$query ="SELECT * FROM tareas.tarea where ".$campo." = '".$parametro."' LIMIT ".($posIni-1).",".PROXPAG;
	$resu=array();
	$resu=$bd->Consulta($query);

	while ($line = $bd->LeeRegistro($resu))
	{
		$tareas[]=$line;
	}
	
	return $tareas;
}
/**
 * Recibe un codigo de provincias y saca el nombre de dicha provincia
 * @param unknown $var
 */
function consiguepro($var)
{
	$provincia=array();
	
	$bd=database::getInstance();
	$query ='SELECT pro.nombre FROM tareas.tbl_provincias pro where pro.cod='.$var;
	$resu=$bd->Consulta($query);
	$provincia = $bd->LeeRegistro($resu);
	return $provincia['nombre'];
}
/**
 * Borra la tarea que corresponda con la id recibida
 * @param unknown $id
 */
function borratarea($id)
{
	$bd=database::getInstance();
	$bd->BorraunRegistro('tarea',$id,'id');
}
/**
 * recibe una id y un campo y saca el valor que se encuentre en esa ubicacion
 * @param unknown $id
 * @param unknown $campo
 */
function sacauncampo($id,$campo)
{
	$dev=array();
	$bd=database::getInstance();
	$sql = "select ".$campo." FROM tareas.tarea WHERE id=".$id.";";
	$resu=$bd->Consulta($sql);
	$dev = $bd->LeeRegistro($resu);

	return $dev[$campo];
}
/**
 * Actualiza los datos de algunas columnas establecidas en los parametros que recibe
 * @param unknown $array
 * @param unknown $id
 */
function actualiza($array,$id)
{
	foreach($array as $campo => $cambio)
	{
		
		$bd=database::getInstance();
		$sql = "Update tarea Set ".$campo." = ".'"'.addslashes($cambio).'"'." Where id= ".$id.";";
		$bd->Consulta($sql);
	}
	
}
/**
 * Funcion que pasa el estado de la tarea a completada y añade las anotaciones posteriores
 * @param unknown $iden
 * @param unknown $anot_pos
 */
function completalatarea($iden,$anot_pos)
{
	$bd=database::getInstance();
	$sql ="update tarea set estado_tarea = 'R' where id= $iden";
	$sql2="update tarea set anot_post = '".$anot_pos."' where id= ".$iden.";";
	$bd->Consulta($sql);
	$bd->Consulta($sql2);
}
/**
 * Cuenta los registros de tarea
 *@return $res
 */
function NRegistros()
{
	$bd=database::getInstance();
	$sql ="SELECT count(*) as total FROM tarea";
	$resu=$bd->Consulta($sql);
	$res=mysqli_fetch_assoc($resu);
	
	return $res['total'];
}
/**
 * Recibe un campo y una condicion y cuenta los registros en los que se de esa condicion en ese
 * campo
 * @param unknown $campo
 * @param unknown $condicion
 * @return unknown
 */
function NReg_buscar($campo,$condicion)
{
	$bd=database::getInstance();
	$sql ="SELECT count(*) as total FROM tarea where ".$campo." = '".$condicion." '";
	$resu=$bd->Consulta($sql);
	$res=mysqli_fetch_assoc($resu);
	return $res['total'];
}
?>

