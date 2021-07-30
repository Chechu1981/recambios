<?php 
include_once('../connection/controller_proveedores.php');

$datos = array($_POST['id'],$_POST['nombre'],$_POST['marca'],$_POST['mail'],$_POST['tlfn'],$_POST['contacto'],$_POST['ciudad'],$_POST['tipo'],$_POST['nameFile'],$_POST['ruta']);

$busqueda = new ConProv();

$fila = $busqueda->insert($datos,@$_FILES['fichero']);