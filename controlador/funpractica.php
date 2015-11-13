<?php
include_once '../modelo/modelo.php';

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

/*falta provincias y fecha rec*/
function creaarraytarea($percon,$descrip,$tlfn,$email,$direccion,
		$pob,$cp,$pro,$estado,$encargado,$anoant,$anopos)
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
			//aqui va fecha realizacion
			'anot_ant'=>$anoant,
			'anot_post'=>$anopos);
	
	return $array;
}

function EscribelistaTarea($tareas)
	{
	
		foreach ($tareas as $clave => $tarea) 
		{
			echo '<tr>';
			echo '<td>'.$tarea['id'].'</td>';
			foreach ($tarea as $clave => $value) {
	
				if($clave == 'id')
					$id = $value;
				
				else if($clave == 'provincia')//Para cambiar la clave x nombre
					echo '<td>'.consiguepro($value).'</td>';
				else if($clave == 'fecha_creacion' || $clave == 'fecha_realizacion')
				{
					$date = new DateTime($value);
					echo '<td>'.date_format($date, 'd-m-Y').'</td>';
				}
				else
					echo '<td>'.$value.'</td>';
			}
			echo '<td>';
	
			/*echo '<p><a href="completartarea.php?id='.$id.'" class="btn btn-primary btn-success" title="Completar tarea"><span class="glyphicon glyphicon-ok"></span></a></p>';
	
			echo '<p><a href="modificar.php?id='.$id.'"class="btn btn-warning" title="Modificar Tarea"><span class="glyphicon glyphicon-pencil"></span></a></p>';
	
			*/
			echo '<a href="borrartarea.php?id='.$id.'" title="Borrar Tarea"><span class="glyphicon glyphicon-remove"></span></a>';
	
			echo '</td>';
			echo '</tr>';
		}


	}

function ValorPost($nombreCampo, $valorPorDefecto = '') {
	if (isset ( $_POST [$nombreCampo] ))
		return $_POST [$nombreCampo];
	else
		return $valorPorDefecto;
}

