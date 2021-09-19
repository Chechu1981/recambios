<?php
include_once("../connection/controller_int.php");

$datos = new ConInt();
$registros = $datos->search();
?>
<h1>INTERNAS</h1>
<div class="tabla">
    <div class="tabla-encabezado">
            <div>CENTRO</div>
            <div>MECÁNICA</div>
            <div>CARROCERIA</div>
            <div>LIMPIEZA</div>
            <div>MES</div>
            <div></div>
    </div>
    <?php echo $registros; ?>
</div>
        