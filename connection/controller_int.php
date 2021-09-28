<?php
include_once('bbdd.php');

class ConInt{

    public function __construct(){

    }

    //Nueva entrada
    public function insert($entrada){
        $db = Db::conectar();
        $sentencia = "INSERT INTO internas (`centro`, `mecanica`, `carroceria`, `limpieza`,`ventas`) VALUES ('$entrada[1]', '$entrada[2]','$entrada[3]','$entrada[4]','$entrada[5]')";
        $select = $db->prepare($sentencia);
        $select->execute();
        echo "Añadido con éxito.";
    }
    //Eliminar entrada
    public function delete($id){
        $db = Db::conectar();
        $sentencia = "DELETE FROM `internas` WHERE id = '".$id."'";
        $select = $db->prepare($sentencia);
        $select->execute();
        echo "Eliminado con éxito.";
    }

    //Modificar campos
    public function update($entrada){
        $db = Db::conectar();
        $sentencia = "UPDATE internas SET centro = '$entrada[1]', mecanica = '$entrada[2]', carroceria = '$entrada[3]', limpieza = '$entrada[4]', ventas = '$entrada[5]' WHERE id LIKE '".$entrada[0]."'";
        $select = $db->prepare($sentencia);
        $select->execute();
        echo "modificado con éxito.";
    }

    //Muestra datos de edicion
    public function edit($id){
        $datos = "";        
        $db = Db::conectar();
        $sentencia = "SELECT * FROM internas WHERE id LIKE '".$id."'";
        $select = $db->prepare($sentencia);
        $select->execute();
        $i = 1;
        while($fila = $select->fetch()){
        $datos = $datos .'
        <div class="container">
        <legend>Editar '.utf8_encode($fila[3]).'</legend>
        
        <div class="row g-3 align-items-center m-1">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Centro</label>
        </div>
        <div class="col-auto">
            <input type="text" id="centro" class="form-control" aria-describedby="passwordHelpInline" value="'.$fila[1].'">
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
                Centro
            </span>
        </div>
    </div>

    <div class="row g-3 align-items-center m-1">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Mecánica</label>
        </div>
        <div class="col-auto">
        <input type="text" id="mecanica" class="form-control" aria-describedby="passwordHelpInline" value="'.$fila[2].'">
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
                Orden de mecánica
            </span>
        </div>
    </div>

    <div class="row g-3 align-items-center m-1">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Carrocería</label>
        </div>
        <div class="col-auto">
            <input type="text" id="carroceria" class="form-control" aria-describedby="passwordHelpInline" value="'.$fila[3].'">
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
                Orden de carrocería
            </span>
        </div>
    </div>

    <div class="row g-3 align-items-center m-1">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Limpieza</label>
        </div>
        <div class="col-auto">
            <input type="text" id="limpieza" class="form-control" aria-describedby="passwordHelpInline" value="'.$fila[4].'">
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
                Orden de limpieza            
            </span>
        </div>
    </div>

    <div class="row g-3 align-items-center m-1">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Ventas</label>
        </div>
        <div class="col-auto">
            <input type="text" id="ventas" class="form-control" aria-describedby="passwordHelpInline" value="'.$fila[5].'">
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
                Orden de ventas            
            </span>
        </div>
    </div>

      <input type="hidden" id="modo" value="update"></input>
      <button class="btn btn-primary m-4" onclick="guardarInt('.$fila[0].')" >Guardar</button>
      <button class="btn btn-secondary m-4 float-end" onclick="eliminarInt('.$fila[0].')" >Eliminar</button>
      </div>';
      } 
      return $datos;
}
    

    //Busca un registro
public function search(){
      $datos = "";
      $db = Db::conectar();
      
      $grupos = "SELECT * FROM internas
      ORDER BY centro";
      $selectGroup = $db->prepare($grupos);
      $selectGroup->execute();
      while($fila = $selectGroup->fetch()){
        $datos = $datos .'
        <div class="tabla-filas">
            <div scope="row" class="tabla-celdas">'.$fila[1].'</div>
            <div class="tabla-celdas">'.$fila[2].'</div>
            <div class="tabla-celdas">'.$fila[3].'</div>
            <div class="tabla-celdas">'.$fila[4].'</div>
            <div class="tabla-celdas">'.$fila[5].'</div>
            <div class="tabla-celdas">
                <img src="./img/outline_edit_black_48dp.png" class="finger" id="Iedit" alt="'.$fila[0].'">
            </div>
        </div>';
    }
    return $datos;
    }

}