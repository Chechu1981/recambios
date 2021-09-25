let guardar = () =>{
    let getDate = document.getElementsByTagName('input');
    let nombre = getDate[0].value;
    let marca = getDate[1].value;
    let mail = getDate[2].value;
    let tlfn = getDate[3].value;
    let contacto = getDate[4].value;
    let ciudad = getDate[5].value;
    let tipo = getDate[6].value;
    let fichero = getDate[7];
    let file = "";
    let nameFile = "";
    let typeFile = "";
    if(fichero.files[0] != undefined){
        file = fichero.files[0];
        nameFile = fichero.files[0]["name"];
        typeFile = fichero.files[0]['type'].split("/")[1];
    }
    let rnd = Math.round(Math.random()*9999999999)+'.'+typeFile;
    let rute = "./docs/"+rnd;
    let modo = document.getElementById('modo').value;

    const formData = new FormData();
    formData.append("nombre", nombre);
    formData.append("marca", marca);
    formData.append("mail", mail);
    formData.append("tlfn", tlfn);
    formData.append("contacto", contacto);
    formData.append("ciudad", ciudad);
    formData.append("tipo", tipo);
    formData.append("fichero", file);
    formData.append("nameFile", nameFile);
    formData.append("typeFile", typeFile);
    formData.append("ruta", rnd);
    formData.append("modo", modo);

    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    
    let id = getParameterByName('id');
    formData.append("id", id);
    
    createObjectXhr('./tables/'+modo+'.php',formData);
    $("myModal").style.display = "none";
}

let eliminar = (id) =>{
    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    } 
    createObjectXhr('./tables/eliminar.php?id='+id);
    $("myModal").style.display = "none";
}

let guardarPass = () =>{    
    let web = document.getElementById('web').value;
    let centro = document.getElementById('centro').value;
    let usuario = document.getElementById('usuario').value;
    let pass = document.getElementById('pass').value;
    let modo = document.getElementById('modo').value;

    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    
    let id = getParameterByName('id');
    let datos = {id,web,centro,usuario,pass};
    const frmData = new FormData();
    frmData.append("id",id);
    frmData.append("web",web);
    frmData.append("centro",centro);
    frmData.append("usuario",usuario);
    frmData.append("pass",pass);
    
    var xhr = new XMLHttpRequest();
    
    xhr.open('POST','./pass/'+modo+'.php');
    xhr.addEventListener('load',(datos)=>{
       document.body.innerHTML = datos.target.response;
   })
    xhr.send(frmData);
    window.opener.location.reload();
    setInterval(function(){window.close()},600);
}

let eliminarPass = () =>{
    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    
    let id = getParameterByName('id');
    //let datos = {id,nombre,marca,mail,tlfn,contacto,ciudad,tipo};
    
    var xhr = new XMLHttpRequest();
    
    xhr.open('GET','./pass/eliminar.php?id='+id);
    xhr.addEventListener('load',(id)=>{
       document.body.innerHTML = datos.target.response;
    })
    xhr.send();
    window.opener.location.reload();
    setInterval(function(){window.close()},600);
}

let guardarLink = () =>{
    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    
    let datos = new FormData();
    datos.append('id',getParameterByName('id'));
    datos.append('link',document.getElementById('link').value);
    datos.append('type',document.getElementById('type').value);
    datos.append('icon',document.getElementById('icon').value);
    datos.append('name',document.getElementById('name').value);
    let modo = document.getElementById('modo').value;
    
    document.body.innerHTML = createObjectXhr('../links/'+modo+'.php',datos);
    
}

let eliminarLink = () =>{
    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    
    let id = getParameterByName('id');
    //let datos = {id,nombre,marca,mail,tlfn,contacto,ciudad,tipo};
    
    var xhr = new XMLHttpRequest();
    
    xhr.open('GET','../links/eliminar.php?id='+id);
    xhr.addEventListener('load',(id)=>{
       document.body.innerHTML = datos.target.response;
    })
    xhr.send();
}

let guardarInt = () =>{
    let centro = document.getElementById('centro').value;
    let mecanica = document.getElementById('mecanica').value;
    let carroceria = document.getElementById('carroceria').value;
    let limpieza = document.getElementById('limpieza').value;
    let ventas = document.getElementById('ventas').value;
    let modo = document.getElementById('modo').value;

    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    
    let id = getParameterByName('id');
    let datos = {id,centro,mecanica,carroceria,limpieza,ventas};
    
    var xhr = new XMLHttpRequest();
    
    xhr.open('GET','../internas/'+modo+'.php?id='+id+'&centro='+centro+'&mecanica='+mecanica+'&carroceria='+carroceria+'&limpieza='+limpieza+'&ventas='+ventas);
    xhr.addEventListener('load',(datos)=>{
       document.body.innerHTML = datos.target.response;
   })
    xhr.send();
    window.opener.location.reload();
    setInterval(function(){window.close()},600);
}

let eliminarInt = () =>{
    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    
    let id = getParameterByName('id');
    //let datos = {id,nombre,marca,mail,tlfn,contacto,ciudad,tipo};
    
    var xhr = new XMLHttpRequest();
    
    xhr.open('GET','../internas/eliminar.php?id='+id);
    xhr.addEventListener('load',(id)=>{
       document.body.innerHTML = datos.target.response;
    })
    xhr.send();
    window.opener.location.reload();
    setInterval(function(){window.close()},600);
}
