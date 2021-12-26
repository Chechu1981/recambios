
"use strict";

let guardar = (id) =>{
    let getDate = document.getElementsByTagName('input');
    let file,nameFile,typeFile = "";
    if(getDate[7].files[0] != undefined){
        file = getDate[7].files[0];
        nameFile = getDate[7].files[0]["name"];
        typeFile = getDate[7].files[0]['name'].split(".")[1];
    }
    let rnd = Math.round(Math.random()*9999999999)+'.'+typeFile;
    const formData = new FormData();
    formData.append("id",id);
    formData.append("nombre",getDate[0].value);
    formData.append("marca",getDate[1].value);
    formData.append("mail",getDate[2].value);
    formData.append("tlfn",getDate[3].value);
    formData.append("contacto",getDate[4].value);
    formData.append("ciudad",getDate[5].value);
    formData.append("tipo",getDate[6].value);
    formData.append("typeFile",typeFile);
    formData.append("nameFile",nameFile);
    formData.append("ruta", rnd);
    formData.append("fichero", file);
    
    fetch('./tables/schedule/'+$('modo').value+'.php',{
        method: 'POST',
        body : formData,
    });
    $("myModal").style.display = "none";
    findRegister($('search').value);
}

let eliminar = (id) =>{
    createObjectXhr('./tables/schedule/eliminar.php?id='+id,table);
    $("myModal").style.display = "none";
    findRegister($('search').value);
}

let guardarPass = (id) =>{    
    const frmData = new FormData();
    frmData.append("id",id);
    frmData.append("web",$('web').value);
    frmData.append("centro",$('centro').value);
    frmData.append("usuario",$('usuario').value);
    frmData.append("pass",$('passwd').value);
    createObjectXhr('./tables/pass/'+$('modo').value+'.php',table,frmData);
    $("myModal").style.display = "none";
    findRegister($('search').value);
}

let eliminarPass = (id) =>{
    createObjectXhr('./tables/pass/eliminar.php?id='+id,table);
    findRegister($('search').value);
}

let guardarLink = (id) =>{    
    let datos = new FormData();
    datos.append('id',id);
    datos.append('link',$('link').value);
    datos.append('type',$('type').value);
    datos.append('icon',$('icon').value);
    datos.append('name',$('name').value);
    let modo = $('modo').value;
    createObjectXhr('./tables/links/'+modo+'.php',table,datos);
    $("myModal").style.display = "none";
    openLink(false,'./tables/links/index.php');
}

let eliminarLink = (id) =>{
    createObjectXhr('./tables/links/eliminar.php?id='+id,table);
    openLink(false,'./tables/links/index.php');
    $("myModal").style.display = "none";
}

let guardarDocs = (id,oldNameFile) =>{
    let getDate = document.getElementsByTagName('input');
    let file,nameFile,typeFile = "";
    if(getDate[0].files[0] != undefined){
        file = getDate[0].files[0];
        nameFile = getDate[0].files[0]["name"];
        typeFile = getDate[0].files[0]['name'].split(".")[1];
    }
    let rnd = Math.round(Math.random()*9999999999)+'.'+typeFile;
    const formData = new FormData();
    formData.append("id",id);
    formData.append("description",$('description').value);
    formData.append("typeFile",typeFile);
    formData.append("nameFile",nameFile);
    formData.append("ruta", rnd);
    formData.append("fichero", file);
    formData.append("oldNameFile",oldNameFile);
    
    fetch('./tables/documents/'+$('modo').name+'.php',{
        method: 'POST',
        body : formData,
    })
    .then(function(){
        $("myModal").style.display = "none";
        openLink(false,'./tables/documents/index.php');
    });    
}

let eliminarDocs = (id) =>{
    createObjectXhr('./tables/documents/eliminar.php?id='+id,table);
    $("myModal").style.display = "none";
}

let guardarAdress = (id) =>{
    let frmData = new FormData();
    frmData.append('id',id);
    frmData.append('center',$('center').value);
    frmData.append('address',$('address').value);
    frmData.append('mail',$('mail').value);
    let modo = $('modo').name;
    createObjectXhr('./tables/address/'+modo+'.php',table,frmData);
    $("myModal").style.display = "none";
}

let eliminarAddress = (id) =>{
    let frmData = new FormData();
    frmData.append('id',id);
    createObjectXhr('./tables/address/eliminar.php',table,frmData);
    $("myModal").style.display = "none";
}

let guardarInt = (id) =>{
    let frmData = new FormData();
    frmData.append('id',id);
    frmData.append('centro',$('centro').value);
    frmData.append('mecanica',$('mecanica').value);
    frmData.append('carroceria',$('carroceria').value);
    frmData.append('limpieza',$('limpieza').value);
    frmData.append('ventas',$('ventas').value);
    let modo = $('modo').value;
    createObjectXhr('./tables/internas/'+modo+'.php',table,frmData)
    $("myModal").style.display = "none";
}

let eliminarInt = (id) =>{
    let frmData = new FormData();
    frmData.append('id',id);
    createObjectXhr('./tables/internas/eliminar.php',table,frmData);
    $("myModal").style.display = "none";
    openLink(false,'./tables/internas/index.php');
}

let openPrBar = () => {
    $('prBar').innerHTML = '<progress id="prgBar" max="100"></progress>';
    let fileLoad = $('file').files[0];
    let fr = new FileReader();
    fr.readAsDataURL(fileLoad);
    fr.addEventListener('progress', function(e){
        $('prgBar').value = (e.loaded * 100)/e.total;
    })
    $('prBar').innerHTML += $('file').files[0].name;
}

let searchRef = () => {
    const value = $('reference').value;
    if(window.event.key === 'Enter'){
        $('cuadro1').innerHTML = '<iframe src="https://www.recambioverde.es/recambios/'+value+'.html" style="width: 100%; height: 100%" name="formularios"></iframe>';
        $('cuadro2').innerHTML = '<iframe src="https://www.autodoc.es/search?keyword='+value+'" style="width: 100%; height: 100%" name="formularios"></iframe>';
        $('cuadro3').innerHTML = '<iframe src="https://www.recambiofacil.com/buscador?ref='+value+'" style="width: 100%; height: 100%" name="formularios"></iframe>';
        $('cuadro4').innerHTML = '<iframe src="http://iparlux.es/catalogoi.asp?bReferencia='+value+'" style="width: 100%; height: 100%" name="formularios"></iframe>';
    };
}