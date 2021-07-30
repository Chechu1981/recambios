<?php 
include_once('../connection/controller_pass.php');

$datos = array($_GET['id'],$_GET['web'],$_GET['centro'],$_GET['usuario'],$_GET['pass']);

$busqueda = new ConPass();

$fila = $busqueda->update($datos);
