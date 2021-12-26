<?php 
include_once('../../connection/controller_proveedores.php');

$busqueda = new ConProv();
@$fila = $busqueda->getJsonFiles($_GET['find']);
if(!empty($fila[0])){
    echo $fila;
}