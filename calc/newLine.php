<?php
include_once('../connection/bbdd.php');

$entrada = $_POST['referencia'];

/* $db = Db::conectar();
$sentencia = "INSERT INTO internas (`centro`, `mecanica`, `carroceria`, `limpieza`,`ventas`) VALUES ('$entrada[1]', '$entrada[2]','$entrada[3]','$entrada[4]','$entrada[5]')";
$select = $db->prepare($sentencia);
$select->execute(); */
echo $entrada;