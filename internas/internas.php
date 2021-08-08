<?php
include_once("../connection/controller_int.php");

$datos = new ConInt();
$registros = $datos->search();
?>
<h1>INTERNAS</h1>
<table class="table table-align-middle table-hover">
    <thead class="thead-inverse">
        <tr>
            <th>CENTRO</th>
            <th>MECÁNICA</th>
            <th>CARROCERIA</th>
            <th>LIMPIEZA</th>
            <th>VENTAS</th>
        </tr>
        </thead>
        <tbody>
            <?php echo $registros; ?>
        </tbody>
</table>