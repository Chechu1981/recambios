<div>
    <legend>Nuevo documento</legend>
    <div class="form-area">
        <label for="description">Descripción del fichero</label>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
    </div>
    <div>
        <label for="file">Documento</label>
        <input type="file" name="file" id="file" onchange="openPrBar()">
        <div id="prBar"></div>
    </div>
    <input type="hidden" id="modo" name="insert">
    <button type="submit" onclick="guardarDocs()">Guardar</button>
</div>