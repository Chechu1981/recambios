
<div class="container">
    <legend>Nueva entrada</legend>


    <div class="row g-3 align-items-center m-1">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Web</label>
        </div>
        <div class="col-auto">
            <input type="text" id="web" class="form-control" aria-describedby="passwordHelpInline" value="">
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
                Nombre de la web
            </span>
        </div>
    </div>

    <div class="row g-3 align-items-center m-1">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Centro</label>
        </div>
        <div class="col-auto">
            <input type="text" id="centro" class="form-control" aria-describedby="passwordHelpInline" value="">
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
                Centro - Ciudad
            </span>
        </div>
    </div>

    <div class="row g-3 align-items-center m-1">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Usuario</label>
        </div>
        <div class="col-auto">
            <input type="mail" id="usuario" class="form-control" aria-describedby="passwordHelpInline" value="">
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
                Usuario
            </span>
        </div>
    </div>

    <div class="row g-3 align-items-center m-1">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Contraseña</label>
        </div>
        <div class="col-auto">
            <input type="tel" id="pass" class="form-control" aria-describedby="passwordHelpInline" value="">
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
                Contraseña
            </span>
        </div>
    </div>

    <input type="hidden" id="modo" value="insert"></input>
    <button onclick="guardarPass()">Guardar</button>
</div>