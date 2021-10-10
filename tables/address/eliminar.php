<?php 
include_once('../../connection/controller_address.php');

$busqueda = new ConAddress();

$fila = $busqueda->delete($_POST['id']);