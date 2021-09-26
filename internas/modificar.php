<?php 
include_once('../connection/controller_int.php');

$busqueda = new ConInt();
$fila = $busqueda->edit($_POST['id']);
echo $fila;
?>
