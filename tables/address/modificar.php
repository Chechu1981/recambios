<?php 
include_once('../../connection/controller_address.php');

$busqueda = new ConAddress();
$fila = $busqueda->editar($_POST['id']);
echo $fila;