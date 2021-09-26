<?php
include_once('../connection/controller_proveedores.php');

$busqueda = new ConProv();
@$fila = $busqueda->getModal($_POST['id']);
if(!empty($fila[0])){
    echo $fila;
}