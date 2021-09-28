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
    xhr.open('POST',target,false);    
    xhr.addEventListener('load',(e)=>{
        str = e.target.response;
    });
    xhr.send(data);
    return str;
}

//LOAD HOME
let firstPage = () => {
    $('search').disabled = false;
    table.innerHTML = createObjectXhr('./main/cards.php',true);
}
firstPage();

// SEARCH
$('search').addEventListener('click',() => {
    $('search').select();
})

let findRegister = (target) =>{
    let prov = createObjectXhr('./tables/proveedores.php?find='+target);
    let password = createObjectXhr('./pass/pass.php?find='+target);
    return prov + password;
}
 
$('search').addEventListener('keyup',(e) => {
    table.style.display = 'block';    
    table.innerHTML =  findRegister(e.target.value);
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

// OPEN MODAL
let abrirmodal = (id,tb,typ) => {
    const modal = $("myModal");
    let frmData = new FormData();
    frmData.append('id',id);
    modal.style.display = "block";
    modal.firstElementChild.innerHTML = createObjectXhr(`./${tb}/${typ}.php`,frmData);
    console.log(id,tb,typ);
}

//Toggle tabs links

let changeTab = (id) => {
    Array.from(document.getElementsByTagName('button')).map((e) => e.className = '');
    console.log(id);
    Array.from(document.getElementsByClassName('block')).map((e) =>{
        e.className = "block hide";
        console.log(e.id);
        (e.id == id) ? e.className = "block show": e.className = "block hide";
    });
    $(id).className = "active";
}

// LISTEN CLICKS
document.body.addEventListener('click',(e)=>{
    (e.target.id == "new") ? openLink(true,'./tables/nuevo.php','new') : "";
    (e.target.id == "passNew") ? openLink(true,'./pass/nuevo.php','passNew') : "";
    (e.target.id == "linkNew") ? openLink(true,'./links/nuevo.php','linkNew') : "";
    (e.target.id == "intNew") ? openLink(true,'./internas/nuevo.php','intNew') : "";
    (e.target.id == "calc" || e.target.id == "calcMain") ? openLink(true,'./calc/calc.php') : "";
    (e.target.alt == "ocasionplus") ? firstPage(false) : "";
    (e.target.id == "edit") ? abrirmodal(e.target.alt,'tables','modificar') : "";
    (e.target.id == "Pedit") ? abrirmodal(e.target.alt,'pass','modificar') : "";
    (e.target.id == "Ledit") ? abrirmodal(e.target.alt,'links','modificar') : "";
    (e.target.id == "Iedit") ? abrirmodal(e.target.alt,'internas','modificar') : "";
    (e.target.id == "links" || e.target.id == "linksMain") ? openLink(false,'./links/links.php') : "";
    (e.target.id == "pass" || e.target.id == "passMain") ? openLink(false,'./pass/pass.php') : "";
    (e.target.id == "agenda" || e.target.id == "agendaMain") ? openLink(false,'./tables/proveedores.php') : "";
    (e.target.id == "internas" || e.target.id == "internasMain") ? openLink(false,'./internas/internas.php') : "";
    (e.target.id == "info") ? abrirmodal(e.target.alt,'tables','modal') : "";
    (e.target.id == "Pinfo") ? abrirmodal(e.target.alt,'pass','modal') : "";
    (e.target.id == "closeModal") ? $("myModal").style.display = "none" : "";
    (e.target.id == "myModal") ? $("myModal").style.display = "none" : "";
    (e.target.name == "linkButton") ? changeTab(e.target.innerText) : "";
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