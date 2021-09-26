let guardar = () =>{
    let getDate = document.getElementsByTagName('input');
    let file,nameFile,typeFile = "";
    if(getDate[7].files[0] != undefined){
        file = fichero.files[0];
        nameFile = fichero.files[0]["name"];
        typeFile = fichero.files[0]['type'].split("/")[1];
    }
    let rnd = Math.round(Math.random()*9999999999)+'.'+typeFile;
    const formData = new FormData();
    formData.append("nombre",getDate[0].value);
    formData.append("marca",getDate[1].value);
    formData.append("mail",getDate[2].value);
    formData.append("tlfn",getDate[3].value);
    formData.append("contacto",getDate[4].value);
    formData.append("ciudad",getDate[5].value);
    formData.append("nameFile",getDate[6].value);
    formData.append("typeFile",getDate[7]);
    formData.append("ruta", rnd);
    
    createObjectXhr('./tables/'+$('modo').value+'.php',formData);
    $("myModal").style.display = "none";
    table.innerHTML = findRegister($('search').value);
}

let eliminar = (id) =>{
    createObjectXhr('./tables/eliminar.php?id='+id);
    $("myModal").style.display = "none";
    table.innerHTML = findRegister($('search').value);
}

let guardarPass = () =>{    
    const frmData = new FormData();
    frmData.append("web",$('web').value);
    frmData.append("centro",$('centro').value);
    frmData.append("usuario",$('usuario').value);
    frmData.append("pass",$('pass').value);
    table.innerHTML = createObjectXhr('./pass/'+$('modo').value+'.php',frmData);
    $("myModal").style.display = "none";
    table.innerHTML = findRegister($('search').value);
}

let eliminarPass = (id) =>{
    createObjectXhr('./pass/eliminar.php?id='+id);
    table.innerHTML = findRegister($('search').value);
}

let guardarLink = (id) =>{    
    let datos = new FormData();
    datos.append('id',id);
    datos.append('link',$('link').value);
    datos.append('type',$('type').value);
    datos.append('icon',$('icon').value);
    datos.append('name',$('name').value);
    let modo = $('modo').value;
    createObjectXhr('./links/'+modo+'.php',datos);
    $("myModal").style.display = "none";
    openLink(false,'./links/links.php');
}

let eliminarLink = (id) =>{
    createObjectXhr('./links/eliminar.php?id='+id);
    openLink(false,'./links/links.php');
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
    createObjectXhr('./internas/'+modo+'.php',frmData);
    $("myModal").style.display = "none";
    openLink(false,'./internas/internas.php');
}

let eliminarInt = (id) =>{
    let frmData = new FormData();
    frmData.append('id',id);
    createObjectXhr('./internas/eliminar.php',frmData);
    $("myModal").style.display = "none";
    openLink(false,'./internas/internas.php');
}
