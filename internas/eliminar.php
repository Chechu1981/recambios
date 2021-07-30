<?php 
include_once('../connection/controller_int.php');

$busqueda = new ConInt();

$fila = $busqueda->delete($_GET['id']);