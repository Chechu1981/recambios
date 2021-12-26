<div>
    <legend>Nuevo documento</legend>
    <div class="form-area">
        <label for="description">Centro</label>
        <input name="center" id="center" >
    </div>
    <div>
        <label for="file">Direccion</label>
        <div contenteditable name="address" id="address" cols="30" rows="20"></div>
    </div>
    <div class="form-area">
        <label for="description">Correo electrónico</label>
        <input name="mail" id="mail" >
    </div>
    <div class="row-form">
        <div class="col-auto">
            <input type="hidden" id="modo" name="insert">
        </div>
        <div class="col-auto">
            <button class="btn-frm" type="submit" onclick="guardarAdress()">Guardar</button>
        </div>
    </div>
</div>