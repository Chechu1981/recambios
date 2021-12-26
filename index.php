<!--
________$$$$
_______$$__$
_______$___$$
_______$___$$
_______$$___$$
________$____$$
________$$____$$$
_________$$_____$$
_________$$______$$
__________$_______$$
____$$$$$$$________$$
__$$$_______________$$$$$$
_$$____$$$$____________$$$
_$___$$$__$$$____________$$
_$$________$$$____________$
__$$____$$$$$$____________$
__$$$$$$$____$$___________$
__$$_______$$$$___________$
___$$$$$$$$$__$$_________$$
____$________$$$$_____$$$$
____$$____$$$$$$____$$$$$$
_____$$$$$$____$$__$$
_______$_____$$$_$$$
________$$$$$$$$$$
-->
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Recambios</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta description="Agenda personal OcasionPlus de Jesús Martín" content="width=device-width, initial-scale">
    <link rel="icon" type="image/png" href="./img/chechu.ico" sizes="32x32">
    <link href="./css/cssown1.css" rel="stylesheet" >
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
                <div class="item-link" id="agenda">
                    Agenda
                <div class="btn-new" id="btn-new-sh">
                    <img src="./img/descarga.svg" alt="arrow_down" id="arrow_down_sh" class="down-menu">
                </div>
                <div class="new newHidden" id="new">Nuevo</div>
                </div>                
                <div class="item-link" id="pass">
                    Contraseñas
                    <div class="btn-new" id="btn-new-pass">
                        <img src="./img/descarga.svg" alt="arrow_down" id="arrow_down_pass" class="down-menu">
                    </div>
                    <div class="new newHidden" id="passNew">Nuevo</div>
                </div>
                <div class="item-link" id="links">
                    Enlaces
                    <div class="btn-new" id="btn-new-link">
                        <img src="./img/descarga.svg" alt="arrow_down" id="arrow_down_link" class="down-menu">
                    </div>
                    <div class="new newHidden" id="linkNew">Nuevo</div>
                </div>
                <div class="item-link" id="internas">
                    Internas
                    <div class="btn-new" id="btn-new-int">
                        <img src="./img/descarga.svg" alt="arrow_down" id="arrow_down_int" class="down-menu">
                    </div>
                    <div class="new newHidden" id="intNew">Nuevo</div>
                </div>
                <div class="item-link" id="center">
                    Direcciones
                    <div class="btn-new" id="btn-new-add">
                        <img src="./img/descarga.svg" alt="arrow_down" id="arrow_down_add" class="down-menu">
                    </div>
                    <div class="new newHidden" id="centNew">Nuevo</div>
                </div>                
                <div class="item-link" id="documents">
                    Documentos
                    <div class="btn-new" id="btn-new-docs">
                        <img src="./img/descarga.svg" alt="arrow_down" id="arrow_down_docs" class="down-menu">
                    </div>
                    <div class="new newHidden" id="documentsNew">Nuevo</div>
                </div>           
                <div class="item-link" id="calc">
                    Buscadora
                </div>     
            </div>
            <div class="hamb" id="hamb"></div>
            <div class="google">
                <span>
                    <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path></svg>
                </span>
                <input id="search" class="mr-sm-2" type="text" placeholder="Buscar" autocomplete="off">
                <div id="showSearh" class="resultSearch"></div>
            </div>
            
        </nav>
    <div class="contenedor">
        <div id="table"></div>
        <div id="tablepass"></div>
    </div>
    <footer class="foot">
   Jesús Martín <?php echo date("Y"); ?>
    </footer>
    <script src="./js/jsown1.js"></script>
    <script src="./js/jsfrm1.js"></script>
</body>

</html>