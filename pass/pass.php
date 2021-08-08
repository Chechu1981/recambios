<?php 
include_once('../connection/controller_pass.php');

$busqueda = new ConPass();
@$fila = $busqueda->search($_GET['find']);
if(!empty($fila)){
?>
<h1>CONTRASEÑAS</h1>
<table class="tablaOwn">
    <thead>
        <tr>
            <th>N</th>
            <th>PAGINA</th>
            <th>CENTRO</th>
            <th>USUARIO</th>
            <th>CONTRASEÑA</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php echo $fila; ?>
    </tbody>
</table>
<?php
}