
<div class="container">
    <legend>Nueva entrada</legend>


    <div class="row-form">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Enlace</label>
        </div>
        <div class="col-auto">
            <input type="text" id="link" class="form-control" aria-describedby="passwordHelpInline" value="">
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
                Dirección de la web
            </span>
        </div>
    </div>

    <div class="row-form">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Tipo</label>
        </div>
        <div class="col-auto">
            <select type="text" id="type" class="form-control" aria-describedby="passwordHelpInline">
            <option value=""></option>
            <option value="1 PRINCIPAL">1 PRINCIPAL</option>
            <option value="2 HERRAMIENTA">2 HERRAMIENTA</option>
            <option value="3 INTERNET">3 INTERNET</option>
            <option value="4 PROVEEDORES">4 PROVEEDORES</option>
            <option value="5 PARTS">5 PARTS</option>
            <option value="6 DESGUACES">6 DESGUACES</option>
            </select>
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
                Tipo de Web
            </span>
        </div>
    </div>

    <div class="row-form">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Nombre</label>
        </div>
        <div class="col-auto">
            <input type="text" id="name" class="form-control" aria-describedby="passwordHelpInline" value="">
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
                Nombre de la web
            </span>
        </div>
    </div>

    <div class="row-form">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Icono</label>
        </div>
        <div class="col-auto">
            <input type="text" id="icon" class="form-control" aria-describedby="passwordHelpInline" value="">
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
                Icono de la web
            </span>
        </div>
    </div>
    <div class="row-form">
        <div class="col-auto">
            <input type="hidden" id="modo" value="insert"></input>
            <button onclick="guardarLink()" class="btn-frm" >Guardar</button>
        </div>
    </div>
</div>