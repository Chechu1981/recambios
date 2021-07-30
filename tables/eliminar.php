<?php 
include_once('../connection/controller_proveedores.php');

$busqueda = new ConProv();

$fila = $busqueda->delete($_GET['id']);