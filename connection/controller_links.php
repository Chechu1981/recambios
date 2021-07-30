<?php
include_once('bbdd.php');

class ConLinks{

    public function __construct(){

    }

    //Nueva entrada
    public function insert($entrada){
        $db = Db::conectar();
        $sentencia = "INSERT INTO links (`enlace`, `tipo`, `nombre`, `icon`) VALUES ('$entrada[1]', '$entrada[2]','$entrada[3]','$entrada[4]')";
        $select = $db->prepare($sentencia);
        $select->execute();
        echo "Añadido con éxito.";
    }
    
    //Eliminar entrada
    public function delete($id){
        $db = Db::conectar();
        $sentencia = "DELETE FROM `links` WHERE id = '".$id."'";
        $select = $db->prepare($sentencia);
        $select->execute();
        echo "Eliminado con éxito.";
    }

    //Modificar campos
    public function update($entrada){
        $db = Db::conectar();
        $sentencia = "UPDATE links SET enlace = '$entrada[1]', tipo = '$entrada[2]', nombre = '$entrada[3]', icon = '$entrada[4]' WHERE id LIKE '".$entrada[0]."'";
        $select = $db->prepare($sentencia);
        $select->execute();
        echo "modificado con éxito.";
    }

    //Muestra datos de edicion
    public function edit($id){
        $datos = "";        
        $db = Db::conectar();
        $sentencia = "SELECT * FROM links WHERE id LIKE '".$id."'";
        $select = $db->prepare($sentencia);
        $select->execute();
        $i = 1;
        while($fila = $select->fetch()){
        $datos = $datos .'
        <div class="container">
        <legend>Editar '.utf8_encode($fila[3]).'</legend>
        
        
        <div class="row g-3 align-items-center m-1">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Enlace</label>
        </div>
        <div class="col-auto">
            <input type="text" id="link" class="form-control" aria-describedby="passwordHelpInline" value="'.$fila[1].'">
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
                Dirección de la web
            </span>
        </div>
    </div>

    <div class="row g-3 align-items-center m-1">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Tipo</label>
        </div>
        <div class="col-auto">
            <select type="text" id="type" class="form-control" aria-describedby="passwordHelpInline">
            <option value="'.$fila[2].'">'.$fila[2].'</option>
            <option value="1 PRINCIPAL">1 PRINCIPAL</option>
            <option value="2 HERRAMIENTA">2 HERRAMIENTA</option>
            <option value="3 INTERNET">3 INTERNET</option>
            <option value="4 PROVEEDORES">4 PROVEEDORES</option>
            <option value="5 PARTS">5 PARTS</option>
            <option value="6 DESGUACES">6 DESGUACES</option>
            </select>
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
                Tipo de Web
            </span>
        </div>
    </div>

    <div class="row g-3 align-items-center m-1">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Nombre</label>
        </div>
        <div class="col-auto">
            <input type="text" id="name" class="form-control" aria-describedby="passwordHelpInline" value="'.$fila[3].'">
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
                Nombre de la web
            </span>
        </div>
    </div>

    <div class="row g-3 align-items-center m-1">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Icono</label>
        </div>
        <div class="col-auto">
            <input type="text" id="icon" class="form-control" aria-describedby="passwordHelpInline" value="'.$fila[4].'">
        </div>
        <div class="col-auto">
            <span id="passwordHelpInline" class="form-text">
                Icono de la web
            </span>
        </div>
    </div>

      <input type="hidden" id="modo" value="update"></input>
      <button class="btn btn-primary m-4" onclick="guardarLink()" >Guardar</button>
      <button class="btn btn-secondary m-4 float-end" onclick="eliminarLink()" >Eliminar</button>
      </div>';
      } 
      return $datos;
}
    

    //Busca un registro
public function search($nombre){
    $datos = '<ul class="nav nav-tabs" id="myTab" role="tablist">';
    $db = Db::conectar();
    
    $grupos = "SELECT * FROM links
    GROUP BY tipo";
    $selectGroup = $db->prepare($grupos);
    $selectGroup->execute();
    $i = 1;
    $colapsed = "";
    $btnColapsed = "";
    while($fila = $selectGroup->fetch()){
    if($i == 1){
        $colapsed = ' active';
    }else{
        $colapsed = " ";
    }
    
    $datos = $datos.'
    <li class="nav-item" role="presentation">
        <button class="nav-link '.$colapsed.'" id="'.utf8_encode(substr($fila[2],2)).'-tab" data-bs-toggle="tab" data-bs-target="#'.utf8_encode(substr($fila[2],2)).'" type="button" role="tab" aria-controls="'.utf8_encode(substr($fila[2],2)).'" aria-selected="true">'.utf8_encode(substr($fila[2],2)).'</button>
    </li>';
    $i++;
    }
    $i = 1;
    $datos = $datos .'
    </ul>
    <div class="tab-content" id="myTabContent">';
    $selectGroup = $db->prepare($grupos);
    $selectGroup->execute();
    while($fila = $selectGroup->fetch()){
    	
	if($i == 1){
		$colapsed = ' show active';
	}else{
		$colapsed = " ";
	}
	
	$datos = $datos .'<div class="tab-pane fade '.$colapsed.'" id="'.substr($fila[2],2).'" role="tabpanel" aria-labelledby="home-tab">';
    	
        $enlaces = "SELECT * FROM links
        WHERE tipo LIKE '".$fila[2]."'
        ORDER BY nombre asc";
        
        $selectLinks = $db->prepare($enlaces);
        $selectLinks->execute();        
           
        while($filaLink = $selectLinks->fetch()){
            $datos = $datos . '<dt>
            <span class="link">
                <a href="'.$filaLink[1].'"  target="_blank">
                    <img width="20px" src="'.$filaLink[4].'">'.utf8_encode($filaLink[3]).'
                </a>
                <a href="javascript:openWindow(\'./links/modificar.php?id='.$filaLink[0].'\')" >
                    <img class="edit" id="edit" src="./img/pencil-square.svg">
                </a>
            </span>';
        }
        $datos = $datos . '</div>';
        $i++;
    }
    $datos = $datos . '</div>';
    return $datos;
    }

}