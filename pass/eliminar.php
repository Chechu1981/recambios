<?php 
include_once('../connection/controller_pass.php');

$busqueda = new ConPass();

$fila = $busqueda->delete($_GET['id']);