<link href="../css/bootstrap.min.css" rel="stylesheet">
<script src="../js/jquery-3.6.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<div class="container">
    <legend>Nueva entrada</legend>


    <div class="row g-3 align-items-center m-1">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Nombre</label>
        </div>
        <div class="col-auto">
            <input type="text" id="nombre" class="form-control" aria-describedby="passwordHelpInline" value="">
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
                Nombre de la empresa
            </span>
        </div>
    </div>

    <div class="row g-3 align-items-center m-1">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Marca</label>
        </div>
        <div class="col-auto">
            <input type="text" id="marca" class="form-control" aria-describedby="passwordHelpInline" value="">
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
                Marca
            </span>
        </div>
    </div>

    <div class="row g-3 align-items-center m-1">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Correo</label>
        </div>
        <div class="col-auto">
            <input type="mail" id="mail" class="form-control" aria-describedby="passwordHelpInline" value="">
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
                Correo electrónico
            </span>
        </div>
    </div>

    <div class="row g-3 align-items-center m-1">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Teléfono</label>
        </div>
        <div class="col-auto">
            <input type="tel" id="tlf" class="form-control" aria-describedby="passwordHelpInline" value="">
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
                Número de teléfono
            </span>
        </div>
    </div>

    <div class="row g-3 align-items-center m-1">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Contacto</label>
        </div>
        <div class="col-auto">
            <input type="text" id="contacto" class="form-control" aria-describedby="passwordHelpInline" value="">
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
                Nombre del contacto
            </span>
        </div>
    </div>

    <div class="row g-3 align-items-center m-1">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Ciudad</label>
        </div>
        <div class="col-auto">
            <input type="text" id="ciudad" class="form-control" aria-describedby="passwordHelpInline" value="">
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
                Ciudad
            </span>
        </div>
    </div>

    <div class="row g-3 align-items-center m-1">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Tipo</label>
        </div>
        <div class="col-auto">
            <input type="text" id="tipo" class="form-control" aria-describedby="passwordHelpInline" value="">
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
                Tipo de la empresa
            </span>
        </div>
    </div>
    <div class="row g-3 align-items-center m-1">
        <div class="col-auto">
          <label for="inputPassword6" class="col-form-label">Fichero</label>
        </div>
        <div class="col-auto">
          <input type="file" id="file" class="form-control" aria-describedby="passwordHelpInline" value="'.$fila[7].'">
        </div>
        <div class="col-auto">
          <span id="passwordHelpInline" class="form-text">
            Sube algún fichero relevante
          </span>
        </div>
        <div class="" id="pb">
            
        </div>
      </div>
    <input type="hidden" id="modo" value="insert"></input>
    <button class="btn btn-primary m-4 float-end" onclick="guardar()">Guardar</button>
</div>
<script src="../js/jsfrm.js"></script>