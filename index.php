<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./img/chechu.ico" sizes="32x32">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/cssown.css" rel="stylesheet" >
    <title>Recambios</title>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <img src="./img/ocasion-plus-logo-1-300x69.jpg"
            class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
            alt="ocasionplus">
        <!-- Nav tabs -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top navBarOwn">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">jSS</a>
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
                    </div>
                </div>
                <input id="search" class="form-control mr-sm-2 d-flex m-3" type="text" placeholder="Buscar" onkeyup="findCust()">
            </div>
        </nav>
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