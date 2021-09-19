<?php
include_once('../connection/controller_pass.php');

$busqueda = new ConPass();
@$fila = $busqueda->getModal($_GET['id']);
if(!empty($fila[0])){
    echo $fila;
}