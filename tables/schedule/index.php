<?php 
include_once('../../connection/controller_proveedores.php');

$busqueda = new ConProv();
@$fila = $busqueda->buscar($_GET['find']);
if(!empty($fila[0])){
?>
<div class="table-title">
    <h1>AGENDA</h1>
</div>
<div class="tabla">
    <div class="tabla-encabezado-prov">
        <div class="th">N</div>
        <div class="th">PROVEEDOR</div>
        <div class="th">MARCA</div>
        <div class="th">CORREO</div>
        <div class="th">TELEFONO</div>
        <div class="th">CONTACTO</div>
        <div class="th"></div>
        <div class="th"></div>
    </div>    
        <?php echo $fila; ?>
</div>

<?php
}