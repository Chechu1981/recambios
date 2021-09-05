<!DOCTYPE html>
<html lang="es">

<head>
    <title>Recambios</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./img/chechu.ico" sizes="32x32">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/cssown.css" rel="stylesheet" >
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
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
        <img src="./img/ocasion-plus-logo-1-300x69.jpg"
            class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
            alt="ocasionplus">
        <!-- Nav tabs -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top navBarOwn" style="padding: 0px 5% 0px 5%;">
            <div class="container-fluid">
                <div class="navbar-brand finger" id="first">jesusma.es</div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <div class="btn-group">
                            <button id="inicio" type="button" class="btn btn-secondary" style="flex:none">
                                Agenda
                            </button>
                            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                <!-- Dropdown menu links -->
                                <a class="nav-link" id="new" href="#">Nuevo</a>
                            </ul>
                        </div>
                        <!-- Example split danger button -->
                        <div class="btn-group">
                            <button id="pass" type="button" class="btn btn-secondary" style="flex:none">
                                Contraseñas
                            </button>
                            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                <!-- Dropdown menu links -->
                                <a class="nav-link" id="passNew" href="#">Nuevo</a>
                            </ul>
                        </div>
                        <div class="btn-group">
                            <button id="internas" type="button" class="btn btn-secondary" style="flex:none">
                                Internas
                            </button>
                            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                <!-- Dropdown menu links -->
                                <a class="nav-link" id="intNew" href="#">Nuevo</a>
                            </ul>
                        </div>
                        <div class="btn-group">
                            <button id="links" type="button" class="btn btn-secondary" style="flex:none">
                                Enlaces
                            </button>
                            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                <!-- Dropdown menu links -->
                                <a class="nav-link" id="linkNew" href="#">Nuevo</a>
                            </ul>
                        </div>
                        <div class="btn-group">
                            <button id="calc" type="button" class="btn btn-secondary" style="flex:none">
                                Calculadora
                            </button>                            
                        </div>
                    </div>
                </div>
                <div class="google">
                <span>
            <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path></svg>
        </span>
                <input id="search" class="mr-sm-2" type="text" placeholder="Buscar" onkeyup="findCust()">
                </div>
            </div>
        </nav>
    <div class="contenedor">
        <div class="table-responsive-sm" id="table"></div>
        <div class="table-responsive-sm" id="tabPass"></div>
        <footer class="foot">
            <div class="footBorder"></div>
            <div class="footText">Jesús Martín 2021</div>
        </footer>
    </div>
    <script src="./js/jsown.js"></script>
</body>

</html>