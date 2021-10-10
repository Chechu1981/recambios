<?php 
include_once('../../connection/controller_documents.php');
$busqueda = new ConDocs();
@$fila = $busqueda->getModal($_POST['id']);
if(!empty($fila[0])){
    echo $fila;
}