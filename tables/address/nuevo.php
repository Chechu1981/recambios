<div>
    <legend>Nuevo documento</legend>
    <div class="form-area">
        <label for="description">Centro</label>
        <input name="center" id="center" >
    </div>
    <div>
        <label for="file">Direccion</label>
        <textarea name="address" id="address" cols="30" rows="20"></textarea>
    </div>
    <div class="form-area">
        <label for="description">Correo electrónico</label>
        <input name="mail" id="mail" >
    </div>
    <input type="hidden" id="modo" name="insert">
    <button type="submit" onclick="guardarAdress()">Guardar</button>
</div>