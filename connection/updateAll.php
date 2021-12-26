<?php
require_once('bbdd.php');

$db = Db::conectar();
$sentencia = "SELECT * FROM password";
$select = $db->prepare($sentencia);
$select->execute();
while($i = $select->fetch()){
    $i[1] = base64_encode($i[1]);
    $i[2] = base64_encode($i[2]);
    $i[3] = base64_encode($i[3]);
    $i[4] = base64_encode($i[4]);
    $sentencia = "UPDATE password SET 
        web = '$i[1]', 
        centro = '$i[2]', 
        usuario = '$i[3]', 
        pass = '$i[4]' 
        WHERE id LIKE '".$i[0]."';";
    echo $sentencia.'<br>';
}

$sentencia = "SELECT * FROM proveedores";
$select = $db->prepare($sentencia);
$select->execute();
while($i = $select->fetch()){
    $i[1] = base64_encode($i[1]);
    $i[2] = base64_encode($i[2]);
    $i[3] = base64_encode($i[3]);
    $i[4] = base64_encode($i[4]);
    $i[5] = base64_encode($i[5]);
    $i[6] = base64_encode($i[6]);
    $i[7] = base64_encode($i[7]);
    $i[8] = base64_encode($i[8]);
    $i[9] = base64_encode($i[9]);
    $sentencia = "UPDATE proveedores SET 
        proveedor = '$i[1]', 
        marca = '$i[2]', 
        mail = '$i[3]', 
        telefono = '$i[4]',
        contacto = '$i[5]',
        ciudad = '$i[6]',
        tipo = '$i[7]',
        fichero = '$i[8]',
        ruta = '$i[9]'
        WHERE id LIKE '".$i[0]."';";
    echo $sentencia.'<br>';
}

$sentencia = "SELECT * FROM internas";
$select = $db->prepare($sentencia);
$select->execute();
while($i = $select->fetch()){
    $i[1] = base64_encode($i[1]);
    $i[2] = base64_encode($i[2]);
    $i[3] = base64_encode($i[3]);
    $i[4] = base64_encode($i[4]);
    $i[5] = base64_encode($i[5]);
    $sentencia = "UPDATE internas SET 
        centro = '$i[1]', 
        mecanica = '$i[2]', 
        carroceria = '$i[3]', 
        limpieza = '$i[4]',
        ventas = '$i[5]'
        WHERE id LIKE '".$i[0]."';";
    echo $sentencia.'<br>';
}

$sentencia = "SELECT * FROM documents";
$select = $db->prepare($sentencia);
$select->execute();
while($i = $select->fetch()){
    $i[1] = base64_encode($i[1]);
    $i[2] = base64_encode($i[2]);
    $i[3] = base64_encode($i[3]);
    $i[4] = base64_encode($i[4]);
    $sentencia = "UPDATE documents SET 
        description = '$i[1]', 
        file = '$i[2]', 
        route = '$i[3]', 
        namefile = '$i[4]'
        WHERE id LIKE '".$i[0]."';";
    echo $sentencia.'<br>';
}

$sentencia = "SELECT * FROM address";
$select = $db->prepare($sentencia);
$select->execute();
while($i = $select->fetch()){
    $i[1] = base64_encode($i[1]);
    $i[2] = base64_encode($i[2]);
    $i[3] = base64_encode($i[3]);
    $sentencia = "UPDATE address SET 
        center = '$i[1]', 
        address = '$i[2]', 
        mail = '$i[3]'
        WHERE id LIKE '".$i[0]."';";
    echo $sentencia.'<br>';
}

$sentencia = "SELECT * FROM links";
$select = $db->prepare($sentencia);
$select->execute();
while($i = $select->fetch()){
    $i[1] = base64_encode($i[1]);
    $i[2] = base64_encode($i[2]);
    $i[3] = base64_encode($i[3]);
    $i[4] = base64_encode($i[4]);
    $i[5] = base64_encode($i[5]);
    $sentencia = "UPDATE links SET 
        enlace = '$i[1]', 
        tipo = '$i[2]', 
        nombre = '$i[3]',
        icon = '$i[4]',
        grupo = '$i[5]'
        WHERE id LIKE '".$i[0]."';";
    echo $sentencia.'<br>';
}