<?php 
include_once('../connection/controller_int.php');

$datos = array($_POST['id'],$_POST['centro'],$_POST['mecanica'],$_POST['carroceria'],$_POST['limpieza'],$_POST['ventas']);

$busqueda = new ConInt();

$fila = $busqueda->insert($datos,@$_FILES['fichero']);