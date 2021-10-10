<?php
include_once('./connection/bbdd.php');

$user = $_POST['user'];
$password = $_POST['password'];

$db = Db::conectar();
$sentencia = "SELECT * FROM usuarios";
$select = $db->prepare($sentencia);
$select->execute();
while($fila = $select->fetch()){
    if($fila[1] == $user && $fila[2] == $password){
        echo 'true';
        return true;
    }
}
echo 'false';