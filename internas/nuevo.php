<link href="../css/bootstrap.min.css" rel="stylesheet">
<script src="../js/jquery-3.6.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<div class="container-xs-12">
    <legend>Nueva entrada</legend>        
        
    <div class="container">
        <div class="col-xs-12">
            <label for="inputPassword6" class="col-form-label">Centro</label>
        </div>
        <div class="col-xs-12">
            <input type="text" id="centro" class="form-control" aria-describedby="passwordHelpInline" value="">
        </div>
        <div class="col-xs-12">
            <span id="passwordHelpInline" class="form-text">
                Centro
            </span>
        </div>
    </div>

    <div class="container">
        <div class="col-xs-12">
            <label for="inputPassword6" class="col-form-label">Mecánica</label>
        </div>
        <div class="col-xs-12">
        <input type="text" id="mecanica" class="form-control" aria-describedby="passwordHelpInline" value="">
        </div>
        <div class="col-xs-12">
            <span id="passwordHelpInline" class="form-text">
                Orden de mecánica
            </span>
        </div>
    </div>

    <div class="container">
        <div class="col-xs-12">
            <label for="inputPassword6" class="col-form-label">Carrocería</label>
        </div>
        <div class="col-xs-12">
            <input type="text" id="carroceria" class="form-control" aria-describedby="passwordHelpInline" value="">
        </div>
        <div class="col-xs-12">
            <span id="passwordHelpInline" class="form-text">
                Orden de carrocería
            </span>
        </div>
    </div>

    <div class="container">
        <div class="col-xs-12">
            <label for="inputPassword6" class="col-form-label">Limpieza</label>
        </div>
        <div class="col-xs-12">
            <input type="text" id="limpieza" class="form-control" aria-describedby="passwordHelpInline" value="">
        </div>
        <div class="col-xs-12">
            <span id="passwordHelpInline" class="form-text">
                Orden de limpieza            
            </span>
        </div>
    </div>

    <div class="container">
        <div class="col-xs-12">
            <label for="inputPassword6" class="col-form-label">Ventas</label>
        </div>
        <div class="col-xs-12">
            <input type="text" id="ventas" class="form-control" aria-describedby="passwordHelpInline" value="">
        </div>
        <div class="col-xs-12">
            <span id="passwordHelpInline" class="form-text">
                Orden de ventas            
            </span>
        </div>
    </div>

    <input type="hidden" id="modo" value="insert"></input>
    <button class="btn btn-primary m-4 float-end" onclick="guardarInt()">Guardar</button>
</div>
<script src="../js/jsfrm.js"></script>