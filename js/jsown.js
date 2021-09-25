"use strict";

const $ = (element) => document.getElementById(element);
const table = $('table');
const oHead = document.getElementsByTagName('HEAD').item(0); 
const oScript= document.createElement("script");
$('search').focus();

// LOAD AJAX OBJECT
let createObjectXhr = (target,data) => {
    let xhr,str;
    (window.XMLHttpRequest) ? xhr = new XMLHttpRequest() : xhr = new ActiveXObject("Microsoft.XMLHTTP");
    console.log(target);
    xhr.open('POST',target,data);
    xhr.addEventListener('load',(data)=>{
        str = data.target.response;
    });
    xhr.send(data);
    return str;
}

// SEARCH
$('search').addEventListener('click',() => {
    $('search').select();
})
 
$('search').addEventListener('keyup',(e) => {
    table.style.display = 'block';
    let prov = createObjectXhr('./tables/proveedores.php?find='+e.target.value);
    let password = createObjectXhr('./pass/pass.php?find='+e.target.value);
    table.innerHTML =  prov + password;
});

let openLink = (e,target,event) =>{
    menuOcultar();
    let openNew = (add)=>{
        const modal = $("myModal");
        modal.style.display = "block";
        modal.firstElementChild.innerHTML = createObjectXhr(add);
    };
    let getTable = (evt,add) =>{
        (evt == true) ? $('search').disabled = true : $('search').disabled = false;
        table.style.display ='block';
        table.innerHTML =  createObjectXhr(add);
    };
    (event == undefined) ? getTable(e,target) : $(event).addEventListener('click',openNew(target));
    document.getElementsByTagName('input')[0].focus();
}

//LOAD HOME
let firstPage = () => {
    $('search').disabled = false;
    table.innerHTML = createObjectXhr('./main/cards.php');
}
document.body.onload = firstPage(true);
window.onload = $('search').focus();

// OPEN MODAL
let abrirmodal = (id,tb,typ) => {
    const modal = $("myModal");
    let tp = 'modal';
    let tabla = 'tables';
    (tb == 'pass') ? tabla = 'pass' : ''; 
    (typ == 'edit') ? tp = 'modificar' : '';
    modal.style.display = "block";
    modal.firstElementChild.innerHTML = createObjectXhr(`./${tabla}/${tp}.php?id=${id}`);
}

// LISTEN CLICKS
document.body.addEventListener('click',(e)=>{
    (e.target.id == "new") ? openLink(true,'./tables/nuevo.php','new') : "";
    (e.target.id == "passNew") ? openLink(true,'./pass/nuevo.php','passNew') : "";
    (e.target.id == "linkNew") ? openLink(true,'./links/nuevo.php','linkNew') : "";
    (e.target.id == "intNew") ? openLink(true,'./internas/nuevo.php','intNew') : "";
    (e.target.id == "calc" || e.target.id == "calcMain") ? openLink(true,'./calc/calc.php') : "";
    (e.target.alt == "ocasionplus") ? firstPage(false) : "";
    (e.target.id == "edit") ? abrirmodal(e.target.alt,'tab','edit') : "";
    (e.target.id == "links" || e.target.id == "linksMain") ? openLink(false,'./links/links.php') : "";
    (e.target.id == "pass" || e.target.id == "passMain") ? openLink(false,'./pass/pass.php') : "";
    (e.target.id == "agenda" || e.target.id == "agendaMain") ? openLink(false,'./tables/proveedores.php') : "";
    (e.target.id == "internas" || e.target.id == "internasMain") ? openLink(false,'./internas/internas.php') : "";
    (e.target.id == "info") ? abrirmodal(e.target.alt,'tab','info') : "";
    (e.target.id == "Pinfo") ? abrirmodal(e.target.alt,'pass','info') : "";
    (e.target.id == "closeModal") ? $("myModal").style.display = "none" : "";
    (e.target.id == "myModal") ? $("myModal").style.display = "none" : "";
});

// HAMB ICON CLICK ACCION
const menuOcultar = () => {
    $('hamb').classList.toggle('animation');
    (window.outerWidth < 992) ? table.style.display = "none" : '';
    $('nav-body').classList.toggle('animation');
    const counte = document.getElementsByClassName('item-link');
    for(let i = 0; i < counte.length;i++){
        counte[i].classList.toggle('animation');
    }
}

const hamburguer = $('hamb').addEventListener('click',menuOcultar);

// COPIAR EN PORTAPAPELES
let copiar = (id) =>{
    let texto = $(id);
    texto.style = "display: block";
    texto.select();
    document.execCommand("copy");
    texto.style = "display:none";
}