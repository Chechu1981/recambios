let table = document.getElementById('table');
let tabPass = document.getElementById('tabPass');
let buscar = document.getElementById('search');
let oHead = document.getElementsByTagName('HEAD').item(0); 
let oScript= document.createElement("script");
 
buscar.focus()
let findCust = () => {
    cadena = buscar.value;
    let xhr,xhr1;
    if(window.XMLHttpRequest){
        xhr1 = new XMLHttpRequest();
        xhr = new XMLHttpRequest();
    }else{
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
        xhr1 = new ActiveXObject("Microsoft.XMLHTTP");
    } 
    xhr.open('GET','./tables/proveedores.php?find='+cadena);
    xhr.addEventListener('load',(data) =>{
        table.innerHTML = data.target.response;
    });
    xhr.send();
    xhr1.open('GET','./pass/pass.php?find='+cadena);
    xhr1.addEventListener('load',(data) =>{
        tabPass.innerHTML = data.target.response;
    });
    xhr1.send(); 
};
let openWindow = (target) => {
    let options = 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=800, height=600, top=85, left=140';
    window.open(target,'Editar',options);
}

let openInternas = () => {
    table.style = 'display:block';
    buscar.disabled = false;
    let xhr;
    if(window.XMLHttpRequest) xhr = new XMLHttpRequest();
    else xhr = new ActiveXObject("Microsoft.XMLHTTP");
    xhr.open('GET','./internas/internas.php');
    xhr.addEventListener('load',(data) =>{
        tabPass.innerHTML = "";
        table.innerHTML = data.target.response;
    });
    xhr.send(); 
}

let internas = document.getElementById('internas');
internas.addEventListener('click',openInternas);

let intNew = document.getElementById('intNew');
intNew.addEventListener('click',()=>{
    let xhr;
    if(window.XMLHttpRequest) xhr = new XMLHttpRequest();
    else xhr = new ActiveXObject("Microsoft.XMLHTTP");
    xhr.open('GET','./internas/nuevo.php');
    xhr.addEventListener('load',(data) =>{
        let options = 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=800, height=600, top=85, left=140';
        window.open('./internas/nuevo.php','Nuevo',options);
        
    });
    xhr.send();
});

let openAgenda = () => {
    table.style = 'display:block';
    buscar.disabled = false;
    let xhr;
    if(window.XMLHttpRequest) xhr = new XMLHttpRequest();
    else xhr = new ActiveXObject("Microsoft.XMLHTTP");
    xhr.open('GET','./tables/proveedores.php');
    xhr.addEventListener('load',(data) =>{
        tabPass.innerHTML = "";
        table.innerHTML = data.target.response;
    });
    xhr.send();
    buscar.focus()
};

let inicio = document.getElementById('inicio');
inicio.addEventListener('click',openAgenda);

let nuevo = document.getElementById('new');
nuevo.addEventListener('click',()=>{
    let xhr;
    if(window.XMLHttpRequest) xhr = new XMLHttpRequest();
    else xhr = new ActiveXObject("Microsoft.XMLHTTP");
    xhr.open('GET','./tables/proveedores.php');
    xhr.addEventListener('load',(data) =>{
        let options = 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=800, height=600, top=85, left=140';
        window.open('./tables/nuevo.php','Nuevo',options);
        
    });
    xhr.send();
});

let openPass = () => {
    table.style = 'display:block';
    buscar.disabled = false;
    let xhr;
    if(window.XMLHttpRequest) xhr = new XMLHttpRequest();
    else xhr = new ActiveXObject("Microsoft.XMLHTTP");
    xhr.open('GET','./pass/pass.php');
    xhr.addEventListener('load',(data) =>{
        table.innerHTML = "";
        tabPass.innerHTML = data.target.response;
    });
    xhr.send();
    buscar.focus()
}

let pass = document.getElementById('pass');
pass.addEventListener('click',openPass);

let pssNuevo = document.getElementById('passNew');
pssNuevo.addEventListener('click',()=>{
    let xhr;
    if(window.XMLHttpRequest) xhr = new XMLHttpRequest();
    else xhr = new ActiveXObject("Microsoft.XMLHTTP");
    xhr.open('GET','./tables/proveedores.php');
    xhr.addEventListener('load',(data) =>{
        let options = 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=800, height=600, top=85, left=140';
        window.open('./pass/nuevo.php','Nuevo',options);
        
    });
    xhr.send();
});

let openEnlaces = () => {
    table.style = 'display:block';
    buscar.disabled = false;
    let xhr;
    if(window.XMLHttpRequest) xhr = new XMLHttpRequest();
    else xhr = new ActiveXObject("Microsoft.XMLHTTP");
    xhr.open('GET','./links/links.php');
    xhr.addEventListener('load',(data) =>{
        tabPass.innerHTML = "";
        table.innerHTML = data.target.response;
    });
    xhr.send();
    buscar.focus();
}

let links = document.getElementById('links');
links.addEventListener('click',openEnlaces);

let linksNuevo = document.getElementById('linkNew');
linksNuevo.addEventListener('click',()=>{
    let xhr;
    if(window.XMLHttpRequest) xhr = new XMLHttpRequest();
    else xhr = new ActiveXObject("Microsoft.XMLHTTP");
    xhr.open('GET','./links/nuevo.php');
    xhr.addEventListener('load',(data) =>{
        let options = 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=800, height=600, top=85, left=140';
        window.open('./links/nuevo.php','Nuevo',options);
        
    });
    xhr.send();
});


let copiar = (id) =>{
    let texto = document.getElementById(id);
    texto.style = "display: block";
    texto.select();
    document.execCommand("copy");
    texto.style = "display:none";
}

//CARGA DEL INICIO

let firstPage = () => {
    buscar.disabled = false;
    table.style = 'display:flex';
    if(window.XMLHttpRequest) xhr = new XMLHttpRequest();
    else xhr = new ActiveXObject("Microsoft.XMLHTTP");
    xhr.open('GET','./main/cards.php');
    xhr.addEventListener('load',(data)=>{
            table.innerHTML = data.target.response;
    });
    xhr.send();
    tabPass.innerHTML = "";
}

window.onload = firstPage();

let btnIni = document.getElementById('first');
btnIni.addEventListener('click',firstPage);

// CALCULADORA

let openCalc = () => {
    table.style = 'display:block';
    buscar.disabled = true;
    let xhr;
    if(window.XMLHttpRequest) xhr = new XMLHttpRequest();
    else xhr = new ActiveXObject("Microsoft.XMLHTTP");
    xhr.open('GET','./calc/calc.php');
    xhr.addEventListener('load',(data) =>{
        tabPass.innerHTML = "";
        table.innerHTML = data.target.response;
    });
    xhr.send();
    buscar.focus();
    setTimeout(() => {
        oScript.type = "text/javascript"; 
        oScript.src="./js/calc.js"; 
        oHead.appendChild( oScript);
    }, 200);
    
}

let calc = document.getElementById('calc');
calc.addEventListener('click',openCalc);

