<!DOCTYPE html>
<html lang="es">

<head>
    <title>Recambios</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./img/chechu.ico" sizes="32x32">
    <!-- <link href="./css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="./css/cssown.css" rel="stylesheet" >
    <script src="./js/jquery-3.6.0.min.js"></script>
    <!-- <script src="./js/bootstrap.min.js"></script> -->
</head>

<body>
    <?php 
    session_start();
    if(isset($_SESSION['user']) != 'jesus'){
        header('Location: login.html');
        echo "nombre usuario de sesion: ".isset($_SESSION['user']);
        echo "entra mal: ".$_GET['user'];
        die();
    }
    ?>
    <div id="myModal" class="modal">
        <div class="modal-content"></div>
    </div>
    <div class="logo" id="first">
        <img src="./img/ocasion-plus-logo-1-300x69.jpg"
            alt="ocasionplus" >
        </div>
        <!-- Nav tabs -->
        <nav>
            <div class="nav-body" id="nav-body">
                <div class="item-link" id="inicio">
                    Agenda
                <div class="btn-new" id="new"></div>
                </div>                
                <div class="item-link" id="pass">
                    Contraseñas
                    <div class="btn-new" id="passNew"></div>
                </div>
                <div class="item-link" id="links">
                    Enlaces
                    <div class="btn-new" id="linkNew"></div>
                </div>
                <div class="item-link" id="internas">
                    Internas
                    <div class="btn-new" id="intNew"></div>
                </div>
                <div class="item-link" id="calc">
                    Calculadora
                    <div class="btn-new" id="intNew"></div>
                </div>   
                <div class="item-link" id="docs">
                    Documentos
                    <div class="btn-new" id="intNew"></div>
                </div>                
            </div>
            <div class="hamb" id="hamb"></div>
            <div class="google">
                <span>
                    <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path></svg>
                </span>
                <input id="search" class="mr-sm-2" type="text" placeholder="Buscar" >
                </div>
        </nav>
    <div class="contenedor">
        <div id="table"></div>
    </div>
    <footer class="foot">
   Jesús Martín <?php echo date("Y"); ?>
    </footer>
    <script src="./js/jsown.js"></script>
</body>

</html>