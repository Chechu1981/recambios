<?php 
include_once('../../connection/controller_address.php');

$datos = array($_POST['id'],$_POST['centro'],$_POST['address'],$_POST['mail']);

$busqueda = new ConAddress();

$fila = $busqueda->update($datos);