<?php 
include_once('../../connection/controller_pass.php');

$busqueda = new ConPass();
@$fila = $busqueda->search($_GET['find']);
if(!empty($fila)){
?><div class="table-title">
    <h1>CONTRASEÑAS</h1>
</div>
<div class="tabla">
<div class="tabla-encabezado-con">
    <div class="th">N</div>
    <div class="th">PAGINA</div>
    <div class="th">CENTRO</div>
    <div class="th">USUARIO</div>
    <div class="th">CONTRASEÑA</div>
    <div class="th"></div>
    <div class="th"></div>
</div>
    <?php echo $fila; ?>
    </div>
<?php
}