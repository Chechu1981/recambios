<div>
    <legend>Nuevo documento</legend>
    <div class="form-area">
        <label for="description">Descripción del fichero</label>
        <textarea contenteditable name="description" id="description" cols="30" rows="10"></textarea>
    </div>
    <div class="row-form">
        <div class="col-auto">
            <label for="file">Documento</label>
        </div>
        <div>
            <button id="btnUpload" class="btn-frm">Subir Documento</button>
            <input type="file" name="file" id="file" onchange="openPrBar()" style="display: none">
        </div>
        <div id="prBar">
          <span>
            Sube algún fichero relevante
          </span>
        </div>
    </div>
    <div class="row-form">
        <div class="col-auto">
            <input type="hidden" id="modo" name="insert">
        </div>
        <div class="col-auto">
            <button class="btn-frm" type="submit" onclick="guardarDocs()">Guardar</button>
        </div>
    </div>
</div>