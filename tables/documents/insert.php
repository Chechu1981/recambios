<?php 
include_once('../../connection/controller_documents.php');

$datos = array($_POST['id'],
            $_POST['description'],
            $_POST['typeFile'],
            $_POST['nameFile'],
            $_POST['ruta']);

$busqueda = new ConDocs();

$fila = $busqueda->insert($datos,@$_FILES['fichero']);