<?php
include_once '/model/modelo.php';
/**
 * Función que recibe un usuario y devuelve si su nivel de privilegios,
 * 
 * @param $usuario
 * @return string
 */
function CompruebaTipoUser($usuario)
{
	if ($usuario=='borja')
		return 'Operario';
	else return 'Admin';
}
/**
 * Función que recibe un nombre y un array y convierte el array en un select de ese mismo nombre.
 * 
 * @param $name
 * @param $opciones
 * @param string $valorDefecto
 * @return string
 */
function CreaSelect($name, $opciones, $valorDefecto='')
{
	$html="\n".'<select class="form-control" name="'.$name.'">';
	foreach($opciones as $value=>$text)
	{
		if ($value==$valorDefecto)
			$select='selected="selected"';
		else
			$select="";
		$html.= "\n\t<option value=\"$value\" $select>$text</option>";
	}
	$html.="\n</select>";

	return $html;
}
/**
 * Recibe todos los datos de una tarea y construye un array con esos datos, 
 * que es el valor que devuelve
 * 
 * @param  $percon
 * @param  $descrip
 * @param  $tlfn
 * @param  $email
 * @param  $direccion
 * @param  $pob
 * @param  $cp
 * @param  $pro
 * @param  $estado
 * @param  $encargado
 * @param  $fecharea
 * @param  $anoant
 * @param  $anopos
 * @return $array
 */
function creaarraytarea($percon,$descrip,$tlfn,$email,$direccion,
		$pob,$cp,$pro,$estado,$encargado,$fecharea,$anoant,$anopos)
{
	$array =array(
			'persona_contacto' => $percon,
			'descripcion' => $descrip,
			'telefono_contacto' => $tlfn,
			'correo' => $email,
			'direccion_jardin'=>$direccion,
			'poblacion_jardin'=>$pob,
			'codigopos'=>$cp,
			'provincia'=>$pro,
			'estado_tarea'=>$estado,
			'operario'=>$encargado,
			'fecha_realizacion'=>$fecharea,
			'anot_ant'=>$anoant,
			'anot_post'=>$anopos);
	
	return $array;
}
/**
 * Recibe un array de tareas y construye las filas de resultados para mostrar
 * la lista de tareas.
 * 
 * @param $tareas
 */
function EscribelistaTarea($tareas)
	{
	
		foreach ($tareas as $clave => $tarea) 
		{
			echo '<tr>';
			echo '<td>'.$tarea['id'].'</td>';
			foreach ($tarea as $clave => $value)
			{
	
				if($clave == 'id')
					$id = $value;
				
				else if($clave == 'provincia')//Para cambiar la clave x nombre
					echo '<td>'.consiguepro($value).'</td>';
				else if($clave == 'fecha_creacion' || $clave == 'fecha_realizacion')
				{
					$date = new DateTime($value);
					echo '<td>'.date_format($date, 'Y-m-d').'</td>';
				}
				else
					echo '<td>'.$value.'</td>';
			}
			echo '<td>';
			if ($_SESSION['tipouser']=="Operario")
			{
				echo '<p><a href="?id='.$id.'&ctrl=completatarea"" title="Completar tarea">
				  <span class="glyphicon glyphicon-ok"></span></a></p>';
			}
			if ($_SESSION['tipouser']=="Admin")
			{
			echo '<p><a href="?id='.$id.'&ctrl=modificartarea"" title="Modificar Tarea">
					<span class="glyphicon glyphicon-pencil"></span></a></p>';
			echo '<p><a href="?id='.$id.'&ctrl=borrartarea"" title="Borrar Tarea">
					<span class="glyphicon glyphicon-remove"></span></a></p>';
			}
			echo '</td>';
			echo '</tr>';
		}

	}

/**
 * Recibe el nombre de un campo en un post, si ese post tiene algun dato lo devuelve ,
 * si no, devuelve el valor por defecto establecido
 * 
 * @param unknown $nombreCampo
 * @param string $valorPorDefecto
 * @return unknown|string
 */
function ValorPost($nombreCampo, $valorPorDefecto = '') {
	if (isset ( $_POST [$nombreCampo] ))
		return $_POST [$nombreCampo];
	else
		return $valorPorDefecto;
}

/**
 * Recibe el valor de un radiobutton asi como su id y el campo al que pertenece en la base de datos,
 * si ese valor corresponde con el que asignado en la BBDD ese valor es el que selecciono el usuario
 * , por lo tanto sera marcado(checked)
 * 
 * @param unknown $valor
 * @param unknown $id
 * @param unknown $fila
 * @return string
 */
function  compruebacheck($valor,$id,$fila)
{
	if ($valor==sacauncampo($id,$fila))
	return 'checked';
	else return'unchecked';
	
}
/**
 * Recibo como parametros los datos introducidos en el login, los compara con los almacenados
 * y si coincide con algunos de los previamente guardados devuelve true, en caso contrario false.
 * 
 * @param unknown $user
 * @param unknown $pass
 * @return boolean
 */
function  validausuario($user,$pass)
{
	$usuario='borja';
	$admin='admin';
	$contuser='12345';
	$contadmin='admin';
	
	if ($user==$usuario && $pass==$contuser)
	{
		return true;
	}
	else 
		if ($user==$admin && $pass==$contadmin)
		{
			return true;
		}
		else return false;
	}
	


