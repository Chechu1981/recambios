
let foco = document.getElementsByTagName("input")[0];
foco.focus();
let guardar = () =>{
    let nombre = document.getElementById('nombre').value;
    let marca = document.getElementById('marca').value;
    let mail = document.getElementById('mail').value;
    let tlfn = document.getElementById('tlf').value;
    let contacto = document.getElementById('contacto').value;
    let ciudad = document.getElementById('ciudad').value;
    let tipo = document.getElementById('tipo').value;
    let fichero = document.getElementById('file');
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
    //let datos = {id,nombre,marca,mail,tlfn,contacto,ciudad,tipo,fichero,nameFile,typeFile,rute,modo};
    
    let xhr = new XMLHttpRequest();
    xhr.addEventListener('progress',function(e){
        let percent = (e.loaded / e.total)*100;
        let i=0;
        console.log(percent);
        setInterval(() => {
            i++;
            document.getElementById('pb').innerHTML = 'e.loaded: '+e.loaded+
                                                        '<br>e.total: '+e.total+
                                                        '<br>percent: '+percent+
                                                        '<br>time: '+i;
        }, 100);
    })
    xhr.open('POST','../tables/'+modo+'.php');
    xhr.addEventListener('load',(datos)=>{
       //document.body.innerHTML = datos.target.response;
   })
    xhr.send(formData);
    setInterval(function(){window.close()},600);
    window.opener.location.reload();
}

let eliminar = () =>{
    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    
    let id = getParameterByName('id');
    //let datos = {id,nombre,marca,mail,tlfn,contacto,ciudad,tipo};
    
    let xhr = new XMLHttpRequest();
    
    xhr.open('GET','../tables/eliminar.php?id='+id);
    xhr.addEventListener('load',(id)=>{
       document.body.innerHTML = id.target.response;
    })
    xhr.send();
    window.opener.location.reload();
    setInterval(function(){window.close()},600);
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
    
    xhr.open('POST','../pass/'+modo+'.php');
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
    
    xhr.open('GET','../pass/eliminar.php?id='+id);
    xhr.addEventListener('load',(id)=>{
       document.body.innerHTML = datos.target.response;
    })
    xhr.send();
    window.opener.location.reload();
    setInterval(function(){window.close()},600);
}

let guardarLink = () =>{
    let link = document.getElementById('link').value;
    let type = document.getElementById('type').value;
    let name = document.getElementById('name').value;
    let icon = document.getElementById('icon').value;
    let modo = document.getElementById('modo').value;

    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    
    let id = getParameterByName('id');
    let datos = {id,link,type,name,icon};
    
    var xhr = new XMLHttpRequest();
    
    xhr.open('GET','../links/'+modo+'.php?id='+id+'&link='+link+'&type='+type+'&name='+name+'&icon='+icon);
    xhr.addEventListener('load',(datos)=>{
       document.body.innerHTML = datos.target.response;
   })
    xhr.send();
    window.opener.location.reload();
    setInterval(function(){window.close()},600);
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
    window.opener.location.reload();
    setInterval(function(){window.close()},600);
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
