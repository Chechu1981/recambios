<?php 
include_once('../../connection/controller_address.php');

$busqueda = new ConAddress();
$fila = $busqueda->buscar();

?>
<div class="table-title">
    <h1>DOCUMENTOS</h1>
</div>
<div class="tabla">
    <div class="tabla-encabezado-docs">
        <div class="th">N</div>
        <div class="th">CENTRO</div>
        <div class="th">DIRECCION</div>
        <div class="th"></div>
        <div class="th"></div>
    </div>    
        <?php echo $fila; ?>        
</div>