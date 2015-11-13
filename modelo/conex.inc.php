<?php
// Conectando, seleccionando la base de datos
$link = mysqli_connect('localhost','root','')
	or die('No se pudo conectar: ' . mysqli_error($link));
mysqli_set_charset($link, "utf8");

echo 'Connected successfully<br>';

mysqli_select_db($link,'bdprovincias') or die('No se pudo seleccionar la base de datos');
?>