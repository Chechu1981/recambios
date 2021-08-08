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
  $dir_subida = '../docs/';
  $fichero_subido = $dir_subida . $entrada[9];
  @rename($fichero['name'],$entrada[9]);
  if (move_uploaded_file(@$fichero['tmp_name'], $fichero_subido)) {
      echo "El fichero es válido y se subió con éxito.<p>";
  } else {
      echo "Ningún fichero subido.<p>";
  }

  //echo "INSERT INTO proveedores (`proveedor`, `marca`, `mail`, `telefono`, `contacto`, `ciudad`, `tipo`) VALUES ('$entrada[1]', '$entrada[2]','$entrada[3]','$entrada[4]','$entrada[5]','$entrada[6]','$entrada[7]')";
  echo "Añadido con éxito.";
}

//Eliminar entrada
public function delete($id){
  $db = Db::conectar();
  $fichero = "SELECT ruta FROM proveedores WHERE id = '".$id."'";
  foreach ($db->query($fichero) as $row) {
    $nameFile = $row[0];
  }
  $sentencia = "DELETE FROM `proveedores` WHERE id = '".$id."'";
  $select = $db->prepare($sentencia);
  $select->execute();
  @unlink('../docs/'.$nameFile);
  echo "Eliminado con éxito.";
}

    //modifica los campos
public function update($entrada,$fichero) {
  $db = Db::conectar();
  $sentencia = "UPDATE proveedores SET proveedor = '$entrada[1]', marca = '$entrada[2]', mail = '$entrada[3]', telefono = '$entrada[4]', contacto = '$entrada[5]', ciudad = '$entrada[6]', tipo = '$entrada[7]', fichero = '$entrada[8]', ruta = '$entrada[9]' WHERE id LIKE '".$entrada[0]."'";
  $select = $db->prepare($sentencia);
  $select->execute();

  //Guarda el fichero en el servidor
  $dir_subida = '../docs/';
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
          <input type="file" id="file" class="form-control" aria-describedby="passwordHelpInline" value="./docs/'.$fila[8].'">
        </div>
        <div class="col-auto">
          <span id="passwordHelpInline" class="form-text">
            Sube algún fichero relevante
          </span>
        </div>
      </div>
      <input type="hidden" id="modo" value="update"></input>
      <button class="btn btn-primary m-4" onclick="guardar()" >Guardar</button>
      <button class="btn btn-secondary m-4 float-end" onclick="eliminar()" >Eliminar</button>
      </div>';
      } 
    return $datos;
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
        $daProv = $daProv .'<tr>
            <td scope="row" data-label="N" >'.$i++.'</td>
            <td data-label="PROVEEDOR" >'.strtoupper($fila[1]).'</td>
            <td data-label="MARCA" >'.strtoupper($fila[2]).'</td>
            <td data-label="CORREO" ><a href="mailto:'.$fila[3].'">'.$fila[3].'</a></td>
            <td data-label="TELÉFONO" ><a href="tel:+34 '.$fila[4].'">'.$fila[4].'</a></td>
            <td data-label="CONTACTO" >'.strtoupper($fila[5]).'</td>
            <td data-label="EDIT" ><a href="javascript:openWindow(\'./tables/modificar.php?id='.$fila[0].'\')" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
          </svg></a></td>
          <td data-label="INFO" ><img src="./img/info_black_24dp.svg" class="finger" data-bs-toggle="modal" data-bs-target="#sel'.str_replace(' ','',$fila[0]).'"></td>
        </tr>
        <!-- Modal -->
        <div class="modal fade" id="sel'.str_replace(' ','',$fila[0]).'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="sel'.str_replace(' ','',$fila[0]).'">'.$fila[1].'</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
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
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
        </div>
        </div>
        </div>
        </div>';
    }
    
    return $daProv;
}

}
?>