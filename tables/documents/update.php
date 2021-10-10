<?php
include_once('../../connection/controller_documents.php');

$datos = array($_POST['id'],
            $_POST['description'],
            $_POST['typeFile'],
            $_POST['nameFile'],
            $_POST['ruta']);

$data = new ConDocs();
$data->update($datos,@$_FILES['fichero']);