<?php 
include_once('../connection/controller_int.php');

$busqueda = new ConInt();
$fila = $busqueda->edit($_GET['id']);
echo $fila;
?>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<script src="../js/jquery-3.6.0.min.js" ></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jsfrm.js"></script>