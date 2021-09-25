<?php 
include_once('../connection/controller_links.php');

$datos = array($_POST['id'],$_POST['link'],$_POST['type'],$_POST['name'],$_POST['icon']);

$busqueda = new ConLinks();

$fila = $busqueda->insert($datos);