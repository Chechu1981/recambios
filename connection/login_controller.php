<?php 
    if(isset($_SESSION['user']) || isset($_GET['user']) != 'jesus'){
        header('Location: ../login.html');
        echo "nombre usuario de sesion: ".isset($_SESSION['user']);
        echo "entra mal: ".$_GET['user'];
        die();
    }else{
        session_start();
        $_SESSION['user'] = $_GET['user'];
        echo "Nombre de usuario: ".$_SESSION['user'];
        header('Location: ../index.php');
    } 
?>