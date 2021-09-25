<?php 
include_once('../connection/controller_proveedores.php');

$busqueda = new ConProv();
$fila = $busqueda->editar($_GET['id']);
echo $fila;
?>