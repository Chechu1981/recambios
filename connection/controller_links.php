<?php
include_once('bbdd.php');

class ConLinks{

    public function __construct(){

    }

    //Nueva entrada
    public function insert($entrada){
        $db = Db::conectar();
        $sentencia = "INSERT INTO links (`enlace`, `tipo`, `nombre`, `icon`) VALUES ('$entrada[0]', '$entrada[1]','$entrada[2]','$entrada[3]')";
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
            <div>
                <div>
                    <label for="inputPassword6">Enlace</label>
                </div>
                <div>
                    <input type="text" id="link" value="'.$fila[1].'">
                </div>
                <div>
                    <span>Dirección de la web</span>
                </div>
            </div>
            <div>
                <div>
                    <label>Tipo</label>
                </div>
                <div>
                    <select type="text" id="type">
                        <option value="'.$fila[2].'">'.$fila[2].'</option>
                        <option value="1 PRINCIPAL">1 PRINCIPAL</option>
                        <option value="2 HERRAMIENTA">2 HERRAMIENTA</option>
                        <option value="3 INTERNET">3 INTERNET</option>
                        <option value="4 PROVEEDORES">4 PROVEEDORES</option>
                        <option value="5 PARTS">5 PARTS</option>
                        <option value="6 DESGUACES">6 DESGUACES</option>
                    </select>
                </div>
                <div>
                    <span>Tipo de Web</span>
                </div>
            </div>
            <div>
                <div>
                    <label>Nombre</label>
                </div>
                <div>
                    <input type="text" id="name" value="'.$fila[3].'">
                </div>
                <div>
                    <span>Nombre de la web</span>
                </div>
            </div>
            <div>
                <div>
                    <label>Icono</label>
                </div>
                <div>
                    <input type="text" id="icon" value="'.$fila[4].'">
                </div>
                <div>
                    <span>Icono de la web</span>
                </div>
            </div>
            <input type="hidden" id="modo" value="update"></input>
            <button onclick="guardarLink('.$fila[0].')" >Guardar</button>
            <button onclick="eliminarLink('.$fila[0].')" >Eliminar</button>
        </div>';
      } 
      return $datos;
}
    

    //Busca un registro
public function search($nombre){
    $datos = '<ul id="myTab" class="links">';
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
    <li>
        <button id="'.utf8_encode(substr($fila[2],2)).'" type="button" name="linkButton">'.utf8_encode(substr($fila[2],2)).'</button>
    </li>';
    $i++;
    }
    $i = 1;
    $datos = $datos .'
    </ul>
    <div id="myTabContent">';
    $selectGroup = $db->prepare($grupos);
    $selectGroup->execute();
    while($fila = $selectGroup->fetch()){
    	
	if($i == 1){
		$colapsed = ' show active';
	}else{
		$colapsed = " ";
	}
	
	$datos = $datos .'<div id="'.substr($fila[2],2).'" class="block" >';
    	
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
                <span>
                    <img class="edit" id="Ledit" alt="'.$filaLink[0].'" src="./img/pencil-square.svg")>
                </span>
            </span>';
        }
        $datos = $datos . '</div>';
        $i++;
    }
    $datos = $datos . '</div>';
    return $datos;
    }

}