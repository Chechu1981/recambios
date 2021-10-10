<?php 
include_once('../../connection/controller_address.php');

$datos = array($_POST['id'],$_POST['center'],$_POST['address'],$_POST['mail']);

$busqueda = new ConAddress($datos);

$fila = $busqueda->insert($datos);