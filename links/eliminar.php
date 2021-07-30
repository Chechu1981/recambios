<?php 
include_once('../connection/controller_links.php');

$busqueda = new ConLinks();

$fila = $busqueda->delete($_GET['id']);