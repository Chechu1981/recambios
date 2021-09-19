"use strict";
const table = document.getElementById('table');
const oHead = document.getElementsByTagName('HEAD').item(0); 
const oScript= document.createElement("script");
const buscar = document.getElementById('search');
buscar.focus();
let respuesta2 ='';

// CARGO AJAX

let xhr,xhr1;
if(window.XMLHttpRequest){
    xhr1 = new XMLHttpRequest();
    xhr = new XMLHttpRequest();
}else{
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
    xhr1 = new ActiveXObject("Microsoft.XMLHTTP");
} 

//buscar
 
let findCust = document.getElementById('search').addEventListener('keyup',(e) => {
    table.style.display = 'block';
    xhr.open('GET','./tables/proveedores.php?find='+e.target.value);
    xhr.addEventListener('load',(data) =>{});
    xhr.send();
    xhr1.open('GET','./pass/pass.php?find='+e.target.value);
    xhr1.addEventListener('load',(data1) =>{
        respuesta2 = data1.target.response;
    });
    xhr1.send();  
});

let openWindow = (target) => {
    let options = 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=800, height=600, top=85, left=140';
    window.open(target,'Editar',options);
}

let openInternas = () => {
    menuOcultar();
    table.style.display ='block';
    buscar.disabled = false;
    xhr.open('GET','./internas/internas.php');
    xhr.addEventListener('load',(data) =>{});
    xhr.send(); 
}

let intNew = document.getElementById('intNew');
    intNew.addEventListener('click',()=>{
        xhr.open('GET','./internas/nuevo.php');
        xhr.addEventListener('load',(data) =>{
            let options = 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=800, height=600, top=85, left=140';
            window.open('./internas/nuevo.php','Nuevo',options);            
        });
    xhr.send();
});

let openAgenda = () => {
    menuOcultar();
    table.style = 'display:block';
    document.getElementById('search').disabled = false;
    xhr.open('GET','./tables/proveedores.php');
    xhr.addEventListener('load',(data) =>{});
    xhr.send();
    document.getElementById('search').focus();
};

let nuevo = document.getElementById('new');
    nuevo.addEventListener('click',()=>{
        xhr.open('GET','./tables/proveedores.php');
        xhr.addEventListener('load',(data) =>{
            let options = 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=800, height=600, top=85, left=140';
            window.open('./tables/nuevo.php','Nuevo',options);  
        });
    xhr.send();
});

let openPass = () => {
    menuOcultar();
    table.style.display = 'block';
    document.getElementById('search').disabled = false;
    xhr.open('GET','./pass/pass.php');
    xhr.addEventListener('load',(data) =>{});
    xhr.send();
    document.getElementById('search').focus();
}

let pssNuevo = document.getElementById('passNew');
    pssNuevo.addEventListener('click',()=>{
        xhr.open('GET','./tables/proveedores.php');
        xhr.addEventListener('load',(data) =>{
            let options = 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=800, height=600, top=85, left=140';
            window.open('./pass/nuevo.php','Nuevo',options);     
        });
    xhr.send();
});

let openEnlaces = () => {
    menuOcultar();
    table.style = 'display:block';
    document.getElementById('search').disabled = false;
    xhr.open('GET','./links/links.php');
    xhr.addEventListener('load',(data) =>{});
    xhr.send();
    document.getElementById('search').focus();
}

let linksNuevo = document.getElementById('linkNew');
    linksNuevo.addEventListener('click',()=>{
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
    table.style.display = 'flex';
    xhr.open('GET','./main/cards.php');
    xhr.addEventListener('load',(data)=>{
        table.innerHTML = data.target.response + respuesta2;
    });
    xhr.send();
}
document.body.onload = firstPage();
window.onload = document.getElementById('search').focus();
// CALCULADORA

let openCalc = () => {
    menuOcultar();
    table.style = 'display:block';
    document.getElementById('search').disabled = true;
    xhr.open('GET','./calc/calc.php');
    xhr.addEventListener('load',(data) =>{});
    xhr.send();
    document.getElementById('search').focus();
    setTimeout(() => {
        oScript.type = "text/javascript"; 
        oScript.src="./js/calc.js"; 
        oHead.appendChild( oScript);
    }, 200);
    
}

let abrirmodal = (id,tb) => {
    let tabla = 'tables';
    (tb == 2) ? tabla = 'pass' : ''; 
    const modal = document.getElementById("myModal");
    xhr.open('GET',`./${tabla}/modal.php?id=${id}`);
    xhr.addEventListener('load',(data) =>{
        modal.style.display = "block";
        modal.firstElementChild.innerHTML = "Hola mundo";
        modal.firstElementChild.innerHTML = data.target.response;
    });
    xhr.send();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
}

document.body.addEventListener('click',(e)=>{
    (e.target.id == "calc") ? openCalc() : "";
    (e.target.alt == "ocasionplus") ? firstPage() : "";
    (e.target.id == "links") ? openEnlaces() : "";
    (e.target.id == "pass") ? openPass() : "";
    (e.target.id == "inicio") ? openAgenda() : "";
    (e.target.id == "internas") ? openInternas() : "";
    (e.target.id == "info") ? abrirmodal(e.target.alt,1) : "";
    (e.target.id == "Pinfo") ? abrirmodal(e.target.alt,2) : "";
    (e.target.id == "closeModal") ? document.getElementById("myModal").style.display = "none" : "";
    (e.target.id == "myModal") ? document.getElementById("myModal").style.display = "none" : "";    
});

// Acción del botón de hamburguesa

const menuOcultar = () => {
    document.getElementById('hamb').classList.toggle('animation');
    table.style.display = "none";
    document.getElementById('nav-body').classList.toggle('animation');
    const counte = document.getElementsByClassName('item-link');
    for(let i = 0; i < counte.length;i++){
        counte[i].classList.toggle('animation');
    }
}

const hamburguer = document.getElementById('hamb').addEventListener('click',menuOcultar);