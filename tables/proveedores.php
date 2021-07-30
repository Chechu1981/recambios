<?php 
include_once('../connection/controller_proveedores.php');

$busqueda = new ConProv();
@$fila = $busqueda->buscar($_GET['find']);
if(!empty($fila[0])){
?>
<h1>AGENDA</h1>
<table class="tablaOwn">
    <thead>
        <th>N</th>
        <th>PROVEEDOR</th>
        <th>MARCA</th>
        <th>CORREO</th>
        <th>TELEFONO</th>
        <th>CONTACTO</th>
        <th></th>
        <th></th>
    </thead>
    <tbody>
        <?php echo $fila; ?>
    </tbody>
</table>
<?php
}