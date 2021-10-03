<?php 
include_once('../connection/controller_links.php');

$busqueda = new ConLinks();
@$fila = $busqueda->search($_GET['find']);

?>
<h1>ENLACES</h1>

<?php echo $fila; ?>