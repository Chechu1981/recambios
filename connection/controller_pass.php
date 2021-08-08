<?php
include_once('bbdd.php');

class ConPass{

    public function __construct(){

    }

    //Nueva entrada
    public function insert($entrada){
        $db = Db::conectar();
        $sentencia = "INSERT INTO password (`web`, `centro`, `usuario`, `pass`) VALUES ('$entrada[1]', '$entrada[2]','$entrada[3]','$entrada[4]')";
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
      <button class="btn btn-secondary m-4 float-end" onclick="eliminarPass()" >Eliminar</button>
      </div>';
      } 
      return $datos;
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
          $datos = $datos .'<tr>
              <td scope="row" data-label="N">'.$i++.'</td>
              <td data-label="PAGINA" >'.$fila[1].'</td>
              <td data-label="CENTRO" >'.$fila[2].'</td>
              <td data-label="USUARIO" >'.$fila[3].'<input type="text" id="1'.$fila[0].'" value="'.$fila[3].'" class="hidden"><img src="./img/content_copy_black_24dp.svg" class="finger" onclick="copiar(1'.$fila[0].')" ></td>
              <td data-label="CONTRASEÑA" >'.$fila[4].'<input type="text" id="2'.$fila[0].'" value="'.$fila[4].'" class="hidden"><img src="./img/content_copy_black_24dp.svg" class="finger" onclick="copiar(2'.$fila[0].')" ></td>
              <td data-label="EDIT" ><a href="javascript:openWindow(\'./pass/modificar.php?id='.$fila[0].'\')" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
              <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
              <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg></a></td>
<td data-label="INFO" ><span data-bs-toggle="modal" data-bs-target="#sel'.str_replace(' ','',$fila[0]).'"><img class="finger" src="./img/info_black_24dp.svg">
</span></td>
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
            Web: '.$fila[1].'<p/>
            Centro: '.$fila[2].'<p/>
            Usuario: '.$fila[3].'<p/>
            Contraseña: '.$fila[4].'<p/>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
          </div>
          </div>
          </div>
          </div>';
      }
    return $datos;
    }

}