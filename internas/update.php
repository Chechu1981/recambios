<?php 
include_once('../connection/controller_int.php');

$datos = array($_GET['id'],$_GET['centro'],$_GET['mecanica'],$_GET['carroceria'],$_GET['limpieza'],$_GET['ventas']);

$busqueda = new ConInt();

$fila = $busqueda->update($datos,@$_FILES['fichero']);