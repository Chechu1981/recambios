<?php 
include_once('../../connection/controller_pass.php');

$busqueda = new ConPass();
$fila = $busqueda->edit($_POST['id']);
echo $fila;
?>