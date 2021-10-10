<?php
require_once('bbdd.php');

class ConProv {

    public function __construct() {
        
    }

    //Nueva entrada
public function insert($entrada,$fichero){
  $db = Db::conectar();
  $sentencia = "INSERT INTO proveedores (`proveedor`, `marca`, `mail`, `telefono`, `contacto`, `ciudad`, `tipo`, `fichero`, `ruta`) VALUES ('$entrada[1]', '$entrada[2]','$entrada[3]','$entrada[4]','$entrada[5]','$entrada[6]','$entrada[7]','$entrada[8]','$entrada[9]')";
  $select = $db->prepare($sentencia);
  $select->execute();

  //Guarda el fichero en el servidor
  $dir_subida = '../../docs/';
  $fichero_subido = $dir_subida . $entrada[9];
  @rename($fichero['name'],$entrada[9]);
  if (move_uploaded_file(@$fichero['tmp_name'], $fichero_subido)) {
      echo "El fichero es válido y se subió con éxito.<p>";
  } else {
      echo "Ningún fichero subido.<p>";
  }

  echo "Añadido con éxito.";
}

//Eliminar entrada
public function delete($id){
  $db = Db::conectar();
  $nameFile = '';
  $fichero = "SELECT ruta FROM proveedores WHERE id = '".$id."'";
  foreach ($db->query($fichero) as $row) {
    $nameFile = $row[0];
  }
  $sentencia = "DELETE FROM `proveedores` WHERE id = '".$id."'";
  $select = $db->prepare($sentencia);
  $select->execute();
  $dir_subida = '../../docs/';
  if($nameFile != ''){
    $fichero_subido = $dir_subida . $nameFile;
    unlink($fichero_subido);
  }
  return true;
}

    //modifica los campos
public function update($entrada,$fichero) {
  $db = Db::conectar();
  $sentencia = "UPDATE proveedores SET proveedor = '$entrada[1]', marca = '$entrada[2]', mail = '$entrada[3]', telefono = '$entrada[4]', contacto = '$entrada[5]', ciudad = '$entrada[6]', tipo = '$entrada[7]', fichero = '$entrada[8]', ruta = '$entrada[9]' WHERE id LIKE '".$entrada[0]."'";
  $select = $db->prepare($sentencia);
  $select->execute();

  //Guarda el fichero en el servidor
  $dir_subida = '../../docs/';
  $fichero_subido = $dir_subida . $entrada[9];
  if(isset($fichero)){
    @rename($fichero['name'],$entrada[9]);
    if (@move_uploaded_file($fichero['tmp_name'], $fichero_subido)) {
        echo "El fichero es válido y se subió con éxito.<p>";
    } else {
        echo "Ningún fichero subido.<p>";
    }
  }else{
    echo $fichero_subido;
    unlink($fichero_subido);
  }
  
  echo "modificado con éxito.";
}


//muestra datos de edicion
public function editar($id) {
    $datos = "";        
    $db = Db::conectar();
    $sentencia = "SELECT * FROM proveedores WHERE id LIKE '".$id."'";
    $select = $db->prepare($sentencia);
    $select->execute();
    $i = 1;
    while($fila = $select->fetch()){
        $datos = $datos .'
        <div class="container">
        <legend>Editar '.$fila[1].'</legend>
        <div class="row g-3 align-items-center m-1">
          <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Nombre</label>
          </div>
          <div class="col-auto">
            <input type="text" id="nombre" class="form-control" aria-describedby="passwordHelpInline" value="'.$fila[1].'">
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
          <input type="text" id="marca" class="form-control" aria-describedby="passwordHelpInline" value="'.$fila[2].'">
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
          <input type="mail" id="mail" class="form-control" aria-describedby="passwordHelpInline" value="'.$fila[3].'">
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
          <input type="tel" id="tlf" class="form-control" aria-describedby="passwordHelpInline" value="'.$fila[4].'">
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
          <input type="text" id="contacto" class="form-control" aria-describedby="passwordHelpInline" value="'.$fila[5].'">
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
          <input type="text" id="ciudad" class="form-control" aria-describedby="passwordHelpInline" value="'.$fila[6].'">
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
          <input type="text" id="tipo" class="form-control" aria-describedby="passwordHelpInline" value="'.$fila[7].'">
        </div>
        <div class="col-auto">
          <span id="passwordHelpInline" class="form-text">
            Tipo de actividad o servicio
          </span>
        </div>
      </div>

      <div class="row g-3 align-items-center m-1">
        <div class="col-auto">
          <label for="inputPassword6" class="col-form-label">Fichero</label>
        </div>
        <div class="col-auto">
          <input type="file" id="file" onchange="openPrBar" value="./docs/'.$fila[8].'">
        </div>
        <div id="prBar">
          <span id="passwordHelpInline" class="form-text">
            Sube algún fichero relevante
          </span>
        </div>
      </div>
      <input type="hidden" id="modo" value="update" onchenge="openPrBar"></input>
      <button onclick="guardar('.$fila[0].')" >Guardar</button>
      <button onclick="eliminar('.$fila[0].')" >Eliminar</button>
      </div>';
      } 
    return $datos;
}

//Devuelve el modal del modal
public function getModal($id){
  $datos = "";        
    $db = Db::conectar();
    $sentencia = "SELECT * FROM proveedores WHERE id LIKE '".$id."'";
    $select = $db->prepare($sentencia);
    $select->execute();
    $i = 1;
    while($fila = $select->fetch()){
      return '
        <div>
          <h2  id="sel'.str_replace(' ','',$fila[0]).'">'.$fila[1].'</h2>
        </div>
        <div>
          Nombre: '.$fila[1].'<p/>
          Marca: '.$fila[2].'<p/>
          Correo: '.$fila[3].'<p/>
          Teléfono: '.$fila[4].'<p/>
          Contacto: '.$fila[5].'<p/>
          Ciudad: '.$fila[6].'<p/>
          Tipo: '.$fila[7].'<p/>
          <a href="./docs/'.$fila[9].'" target="_blank">'.$fila[8].'</a>
        </div>
        <div class="modal-footer">
          <button type="button" id="closeModal">CERRAR</button>
        </div>';
    }
}


//busca el nombre del usuario si existe
public function buscar($nombre) {
    $daProv = "";
    $db = Db::conectar();
    $senProv = "SELECT * FROM proveedores WHERE 
    proveedores.proveedor LIKE \"%".$nombre."%\" 
    OR proveedores.marca LIKE \"%".$nombre."%\" 
    OR proveedores.contacto LIKE \"%".$nombre."%\" 
    OR proveedores.ciudad LIKE \"%".$nombre."%\" 
    OR proveedores.tipo LIKE \"%".$nombre."%\" 
    OR proveedores.mail LIKE \"%".$nombre."%\" 
    ORDER BY proveedor asc";
    
    $seleProv = $db->prepare($senProv);
    $seleProv->execute();
    $i = 1;
    while($fila = $seleProv->fetch()){
        $daProv = $daProv .'
          <div class="tabla-filas-prov">
            <div scope="row" data-label="N" class="tabla-celdas-prov">'.$i++.'</div>
            <div data-label="PROVEEDOR" class="tabla-celdas-prov">'.strtoupper($fila[1]).'</div>
            <div data-label="MARCA" class="tabla-celdas-prov">'.strtoupper($fila[2]).'</div>
            <div data-label="CORREO" class="tabla-celdas-prov"><a href="mailto:'.$fila[3].'">'.$fila[3].'</a></div>
            <div data-label="TELÉFONO" class="tabla-celdas-prov"><a href="tel:+34 '.$fila[4].'">'.$fila[4].'</a></div>
            <div data-label="CONTACTO" class="tabla-celdas-prov">'.strtoupper($fila[5]).'</div>
            <div data-label="EDIT" alt="'.$fila[0].'" id="edit" class="tabla-celdas-prov">
              <img src="./img/outline_edit_black_48dp.png" class="finger" alt="'.str_replace(' ','',$fila[0]).'" id="edit">
            </div>
            <div data-label="INFO" class="tabla-celdas-prov">
              <img src="./img/info_black_24dp.svg" class="finger" alt="'.str_replace(' ','',$fila[0]).'" id="info">
            </div>
          </div>';
    }
    
    return $daProv;
}

}
?>