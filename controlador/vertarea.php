<?php
include_once "../modelo/modelo.php";
$listatar= array();
$listatar=sacatareas();

if (!$_POST)
{
	include_once '../vista/pre_vertareas.php';
}
?>
