<?php
require_once('bbdd.php');

class ConAddress {

    public function __construct() {
        
    }

    //Nueva entrada
  public function insert($entrada){
    $db = Db::conectar();
    $sentencia = "INSERT INTO address (`center`, `address`,`mail`) VALUES ('$entrada[1]', '$entrada[2]', '$entrada[3]')";
    $select = $db->prepare($sentencia);
    $select->execute();

    echo "Añadido con éxito.";
  }

  //Eliminar entrada
  public function delete($id){
    $db = Db::conectar();
    
    $sentencia = "DELETE FROM `address` WHERE id = '".$id."'";
    $select = $db->prepare($sentencia);
    $select->execute();
    
    return true;
  }

      //modifica los campos
  public function update($entrada,$fichero) {
    $db = Db::conectar();
    $sentencia = "UPDATE address SET center = '$entrada[1]', address = '$entrada[2]', mail = '$entrada[3]', WHERE id LIKE '".$entrada[0]."'";
    $select = $db->prepare($sentencia);
    $select->execute();

    echo "modificado con éxito.";
  }


  //muestra datos de edicion
  public function editar($id) {
      $datos = "";        
      $db = Db::conectar();
      $sentencia = "SELECT * FROM address WHERE id LIKE '".$id."'";
      $select = $db->prepare($sentencia);
      $select->execute();
      $i = 1;
      while($fila = $select->fetch()){
          $datos = $datos .'
          <div>
            <legend>Nuevo documento</legend>
            <div class="form-area">
                <label for="description">Centro</label>
                <input name="center" id="center" value="'.$fila[1].'">
            </div>
            <div>
                <label for="file">Direccion</label>
                <textarea name="address" id="address" cols="30" rows="20">'.$fila[2].'</textarea>
            </div>
            <div class="form-area">
                <label for="description">Correo electrónico</label>
                <input name="mail" id="mail" value="'.$fila[3].'">
            </div>
            <input type="hidden" id="modo" name="update">
            <button type="submit" onclick="guardarAdress('.$fila[0].')">Guardar</button>
            <button type="submit" onclick="eliminarAddress('.$fila[0].')">Eliminar</button>
          </div>
          ';
        } 
      return $datos;
  }

  //Devuelve el modal del modal
  public function getModal($id){
    $datos = "";        
      $db = Db::conectar();
      $sentencia = "SELECT * FROM address WHERE id LIKE '".$id."'";
      $select = $db->prepare($sentencia);
      $select->execute();
      $i = 1;
      while($fila = $select->fetch()){
        return '
        <div>
            <legend>Nuevo documento</legend>
            <div class="form-area">
                <label for="description">Centro</label>
                <input name="center" id="center" value="'.$fila[1].'">
            </div>
            <div>
                <label for="file">Direccion</label>
                <textarea name="address" id="address" cols="30" rows="20">'.$fila[2].'</textarea>
            </div>
            <div class="form-area">
                <label for="description">Correo electrónico</label>
                <input name="mail" id="mail" value="'.$fila[3].'">
            </div>
            <input type="hidden" id="modo" name="delete">
            <button type="submit" onclick="eliminarAddress('.$fila[0].')">Guardar</button>
          </div>';
      }
  }


  //busca el nombre del usuario si existe
  public function buscar() {
      $daProv = '';
      $db = Db::conectar();
      $senProv = "SELECT * FROM `address` ORDER BY `center` asc";
      $seleProv = $db->prepare($senProv);
      $seleProv->execute();
      $i = 1;
      while($fila = $seleProv->fetch()){
          $daProv = $daProv . '
          <div class="tabla-filas-docs">
              <div class="tabla-celdas-docs">'.$i++.'</div>
              <div class="tabla-celdas-docs">'.$fila[1].'</div>
              <div class="tabla-celdas-docs">
              '.$fila[2].'
              <input type="text" id="1'.$fila[0].'" value="'.$fila[2].'" class="hidden">
              </div>              
              <div class="tabla-celdas-docs">
                <img src="./img/content_copy_black_24dp.svg" class="finger" onclick="copiar(1'.$fila[0].')">
              </div>
              <div class="tabla-celdas-docs">
                <img src="./img/outline_edit_black_48dp.png" class="finger" alt="'.str_replace(' ','',$fila[0]).'" id="Dedit">
              </div>
          </div>
          ';
      }
      
      return $daProv;
  }

}