<?php 
include_once('../connection/controller_proveedores.php');

$busqueda = new ConProv();
$fila = $busqueda->editar($_GET['id']);
echo $fila;
?>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<script src="../js/jquery-3.6.0.min.js" ></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jsfrm.js"></script>