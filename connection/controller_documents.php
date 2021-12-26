<?php
require_once('bbdd.php');

class ConDocs {

    public function __construct() {
        
    }

//Nueva entrada
public function insert($entrada,$fichero){
  for($c = 0;$c < count($entrada);$c++){
    $entrada[$c] = str_replace("'","\'",$entrada[$c]);
  }
  $db = Db::conectar();
  $sentencia = "INSERT INTO documents (`description`, `file`,`route`,`namefile`) VALUES ('$entrada[1]', '$entrada[2]', '$entrada[4]', '$entrada[3]')";
  $select = $db->prepare($sentencia);
  $select->execute();

  //Guarda el fichero en el servidor
  $dir_subida = '../../docs/';
  $fichero_subido = $dir_subida . $entrada[4];
  @rename($fichero['name'],$entrada[4]);
  if (move_uploaded_file(@$fichero['tmp_name'], $fichero_subido)) {
      echo "El fichero es válido y se subió con éxito.<p>";
  } else {
      echo "Ningún fichero subido.<p>";
  }

  echo "Añadido con éxito.";
}

//modifica los campos
public function update($entrada,$fichero,$oldNameFile) {
  for($c = 0;$c < count($entrada);$c++){
    $entrada[$c] = str_replace("'","\'",$entrada[$c]);
  }
  $db = Db::conectar();
  $sentencia = "UPDATE documents SET description = '$entrada[1]', route = '$entrada[4]', file = '$entrada[2]', namefile = '$entrada[3]' WHERE id LIKE '".$entrada[0]."'";
  $select = $db->prepare($sentencia);
  $select->execute();

  //Borra el fichero anterior
  $dir_subida = '../../docs/';
  if($oldNameFile != ''){
    $fichero_subido = $dir_subida . $oldNameFile;
    unlink($fichero_subido);
  }
  
  //Guarda el fichero en el servidor
  $fichero_subido = $dir_subida . $entrada[4];
  if(isset($fichero)){
    @rename($fichero['name'],$entrada[4]);
    if (@move_uploaded_file($fichero['tmp_name'], $fichero_subido)) {
        echo "El fichero es válido y se subió con éxito.<p>";
    } else {
        echo "Ningún fichero subido.<p>";
    }
  }  
  echo "modificado con éxito.";
}

//Eliminar entrada
public function delete($id){
  $db = Db::conectar();
  $nameFile = '';
  $fichero = "SELECT route FROM documents WHERE id = '".$id."'";
  foreach ($db->query($fichero) as $row) {
    $nameFile = $row[0];
  }
  $sentencia = "DELETE FROM `documents` WHERE id = '".$id."'";
  $select = $db->prepare($sentencia);
  $select->execute();
  $dir_subida = '../../docs/';
  if($nameFile != ''){
    $fichero_subido = $dir_subida . $nameFile;
    unlink($fichero_subido);
  }
  return true;
}

//muestra datos de edicion
public function editar($id) {
    $datos = "";        
    $db = Db::conectar();
    $sentencia = "SELECT * FROM documents WHERE id LIKE '".$id."'";
    $select = $db->prepare($sentencia);
    $select->execute();
    $i = 1;
    while($fila = $select->fetch()){
        $datos = $datos .'
        <div>
          <legend>Nuevo documento</legend>
          <div class="form-area">
              <label for="description">Descripción del fichero</label>
              <textarea name="description" id="description" cols="30" rows="10">'.$fila[1].'</textarea>
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
              '.$fila[4].'
              </span>
            </div>
          </div>
          <input type="hidden" id="modo" name="update">
          <button type="submit" onclick="guardarDocs('.$fila[0].',`'.$fila[3].'`)">Modificar</button>
          <button type="submit" onclick="eliminarDocs('.$fila[0].')">Eliminar</button>
      </div>
        ';
      } 
    return $datos;
}

//Devuelve el modal del modal
public function getModal($id){
  $datos = "";        
    $db = Db::conectar();
    $sentencia = "SELECT * FROM documents WHERE id LIKE '".$id."'";
    $select = $db->prepare($sentencia);
    $select->execute();
    $i = 1;
    while($fila = $select->fetch()){
      return '
      <div>
      <legend>'.$fila[4].'</legend>
      <div class="form-area">
          <label for="description">Descripción del fichero</label>
          <textarea name="description" id="description" cols="30" rows="10">'.$fila[1].'</textarea>
      </div>
      <div class="tabla-celdas-docs">
        <img src="./img/outline_edit_black_48dp.png" class="btn-edit" alt="'.str_replace(' ','',$fila[0]).'" id="DocEdit">
      </div>
      <div>
      </div>
  </div>';
    }
}


//busca el nombre del usuario si existe
public function buscar() {
    $daProv = '';
    $db = Db::conectar();
    $senProv = "SELECT * FROM `documents` ORDER BY `file` asc";
    
    $seleProv = $db->prepare($senProv);
    $seleProv->execute();
    $i = 1;
    while($fila = $seleProv->fetch()){
        $daProv = $daProv . '
        <div class="tabla-filas-docs">
            <div class="tabla-celdas-docs">'.$i++.'</div>
            <div class="tabla-celdas-docs">'.$fila[1].'</div>
            <div class="tabla-celdas-docs"><a href="./docs/'.$fila[3].'" download="./docs/'.$fila[3].'">'.$fila[4].'</a></div>
            <div class="tabla-celdas-docs">
              <img src="./img/info_black_24dp.svg" class="finger" alt="'.str_replace(' ','',$fila[0]).'" id="Dinfo">
            </div>
        </div>
        ';
    }
    
    return $daProv;
}

}
?>