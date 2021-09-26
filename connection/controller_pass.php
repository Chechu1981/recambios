<?php
include_once('bbdd.php');

class ConPass{

    public function __construct(){

    }

    //Nueva entrada
    public function insert($entrada){
        $db = Db::conectar();
        $sentencia = "INSERT INTO password (`web`, `centro`, `usuario`, `pass`) VALUES ('$entrada[0]', '$entrada[1]','$entrada[2]','$entrada[3]')";
        $select = $db->prepare($sentencia);
        $select->execute();
        echo "Añadido con éxito.";
    }
    //Eliminar entrada
    public function delete($id){
        $db = Db::conectar();
        $sentencia = "DELETE FROM `password` WHERE id = '".$id."'";
        $select = $db->prepare($sentencia);
        $select->execute();
        echo "Eliminado con éxito.";
    }

    //Modificar campos
    public function update($entrada){
        $db = Db::conectar();
        $sentencia = "UPDATE password SET web = '$entrada[1]', centro = '$entrada[2]', usuario = '$entrada[3]', pass = '$entrada[4]' WHERE id LIKE '".$entrada[0]."'";
        $select = $db->prepare($sentencia);
        $select->execute();
        echo "modificado con éxito.";
    }

    //Muestra datos de edicion
    public function edit($id){
        $datos = "";        
        $db = Db::conectar();
        $sentencia = "SELECT * FROM password WHERE id LIKE '".$id."'";
        $select = $db->prepare($sentencia);
        $select->execute();
        $i = 1;
        while($fila = $select->fetch()){
        $datos = $datos .'
        <div class="container">
        <legend>Editar '.$fila[1].'</legend>
        
        
        <div class="row g-3 align-items-center m-1">
          <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">web</label>
          </div>
          <div class="col-auto">
            <input type="text" id="web" class="form-control" aria-describedby="passwordHelpInline" value="'.$fila[1].'">
          </div>
          <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
              URL de la web
            </span>
          </div>
        </div>

      <div class="row g-3 align-items-center m-1">
        <div class="col-auto">
          <label for="inputPassword6" class="col-form-label">Centro</label>
        </div>
        <div class="col-auto">
          <input type="text" id="centro" class="form-control" aria-describedby="passwordHelpInline" value="'.$fila[2].'">
        </div>
        <div class="col-auto">
          <span id="passwordHelpInline" class="form-text">
            Ciudad del centro
          </span>
        </div>
      </div>

      <div class="row g-3 align-items-center m-1">
        <div class="col-auto">
          <label for="inputPassword6" class="col-form-label">usuario</label>
        </div>
        <div class="col-auto">
          <input type="mail" id="usuario" class="form-control" aria-describedby="passwordHelpInline" value="'.$fila[3].'">
        </div>
        <div class="col-auto">
          <span id="passwordHelpInline" class="form-text">
            Usuario
          </span>
        </div>
      </div>

      <div class="row g-3 align-items-center m-1">
        <div class="col-auto">
          <label for="inputPassword6" class="col-form-label">Contraseña</label>
        </div>
        <div class="col-auto">
          <input type="tel" id="pass" class="form-control" aria-describedby="passwordHelpInline" value="'.$fila[4].'">
        </div>
        <div class="col-auto">
          <span id="passwordHelpInline" class="form-text">
            Contraseña
          </span>
        </div>
      </div>

      <input type="hidden" id="modo" value="update"></input>
      <button class="btn btn-primary m-4" onclick="guardarPass()" >Guardar</button>
      <button class="btn btn-secondary m-4 float-end" onclick="eliminarPass('.$fila[0].')" >Eliminar</button>
      </div>';
      } 
      return $datos;
}

public function getModal($id){
  $datos = "";        
  $db = Db::conectar();
  $sentencia = "SELECT * FROM password WHERE id LIKE '".$id."'";
  $select = $db->prepare($sentencia);
  $select->execute();
  $i = 1;
  while($fila = $select->fetch()){
  return '     
    <div>
      <h2 id="sel'.str_replace(' ','',$fila[0]).'">'.$fila[1].'</h5>
    </div>
    <div>
      Web: '.$fila[1].'<p/>
      Centro: '.$fila[2].'<p/>
      Usuario: '.$fila[3].'<p/>
      Contraseña: '.$fila[4].'<p/>
    </div>
    <div class="modal-footer">
      <button type="button" id="closeModal">CERRAR</button>
    </div>';
  }
}
    

    //Busca un registro
    public function search($nombre){
      $datos = "";
      $db = Db::conectar();
      $sentencia = "SELECT * FROM password WHERE 
      web LIKE \"%".$nombre."%\" 
      OR centro LIKE \"%".$nombre."%\" 
      OR usuario LIKE \"%".$nombre."%\" 
      ORDER BY web asc";
      $select = $db->prepare($sentencia);
      $select->execute();
      $i = 1;
      while($fila = $select->fetch()){
          $datos = $datos .'
          <div class="tabla-filas-prov">
            <div scope="row" data-label="N" class="tabla-celdas-prov">'.$i++.'</div>
            <div data-label="PAGINA" class="tabla-celdas-prov">'.$fila[1].'</div>
            <div data-label="CENTRO" class="tabla-celdas-prov">'.$fila[2].'</div>
            <div data-label="USUARIO" class="tabla-celdas-prov">'.$fila[3].'<input type="text" id="1'.$fila[0].'" value="'.$fila[3].'" class="hidden"><img src="./img/content_copy_black_24dp.svg" class="finger" onclick="copiar(1'.$fila[0].')" ></div>
            <div data-label="CONTRASEÑA" class="tabla-celdas-prov">'.$fila[4].'<input type="text" id="2'.$fila[0].'" value="'.$fila[4].'" class="hidden">
              <img src="./img/content_copy_black_24dp.svg" class="finger" onclick="copiar(2'.$fila[0].')" ></div>
            <div data-label="EDITAR" id="'.$fila[0].'" alt="Pedit" class="tabla-celdas-prov">
              <img src="./img/outline_edit_black_48dp.png" class="finger" alt="'.str_replace(' ','',$fila[0]).'" id="Pedit">
            </div>
            <div data-label="INFO" alt="'.str_replace(' ','',$fila[0]).'" id="Pinfo" class="tabla-celdas-prov">
              <img class="finger" src="./img/info_black_24dp.svg" alt="'.str_replace(' ','',$fila[0]).'" id="Pinfo">
            </div>
          </div>';
      }
    return $datos;
    }

}