<?php 
include_once('../connection/controller_links.php');

$busqueda = new ConLinks();
$fila = $busqueda->edit($_POST['id']);
echo $fila;
?>