<?php 
include_once('../connection/controller_links.php');

$datos = array($_GET['id'],$_GET['link'],$_GET['type'],$_GET['name'],$_GET['icon']);

$busqueda = new ConLinks();

$fila = $busqueda->update($datos);
