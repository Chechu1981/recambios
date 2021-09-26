<?php 
include_once('../connection/controller_pass.php');

$datos = array($_POST['web'],$_POST['centro'],$_POST['usuario'],$_POST['pass']);

$busqueda = new ConPass();

$fila = $busqueda->insert($datos);