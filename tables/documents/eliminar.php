<?php 
include_once('../../connection/controller_documents.php');
$busqueda = new ConDocs();
$fila = $busqueda->delete($_GET['id']);
return $fila;