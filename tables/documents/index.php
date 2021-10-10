<?php 
include_once('../../connection/controller_documents.php');

$busqueda = new ConDocs();
@$fila = $busqueda->buscar();

?>
<div class="table-title">
    <h1>DOCUMENTOS</h1>
</div>
<div class="tabla">
    <div class="tabla-encabezado-docs">
        <div class="th">N</div>
        <div class="th">DOCUMENTO</div>
        <div class="th">FICHERO</div>
        <div class="th"></div>
    </div>    
        <?php echo $fila; ?>        
</div>