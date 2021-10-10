<?php
include_once('../../connection/controller_documents.php');

$data = new ConDocs();
$datos = $data->editar($_POST['id']);
echo $datos;