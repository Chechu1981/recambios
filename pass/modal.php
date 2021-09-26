<?php
include_once('../connection/controller_pass.php');

$busqueda = new ConPass();
@$fila = $busqueda->getModal($_POST['id']);
if(!empty($fila[0])){
    echo $fila;
}