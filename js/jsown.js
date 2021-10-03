"use strict";

const $ = (element) => document.getElementById(element);
const table = $('table');
const tablePass = $('tablepass');
const modal = $("myModal");
const oHead = document.getElementsByTagName('HEAD').item(0); 
const oScript= document.createElement("script");
$('search').focus();

// LOAD FETCH OBJECT
function createObjectXhr(target,domPrint,data){
    tablePass.innerHTML = '';
    let isModal = true;
    (domPrint == modal) ? domPrint = modal.firstElementChild : isModal = false;
    fetch(target,{
        method: 'POST',
        body: data,
    })
    .then(response => (response.ok == true) ? response.text(): 'cargando datos. Espere.....')
    .then((str) => {
        domPrint.innerHTML = str;
        (target.split('/')[2] == 'update.php') ? openLink(false,'./' + target.split('/')[1] + '/index.php'):'';
    })
    .catch(error => console.log("el error es: " + error));
}

//LOAD HOME
let firstPage = () => {
    $('search').disabled = false;
    createObjectXhr('./main/cards.php',table);
}
firstPage();

// SEARCH
$('search').addEventListener('click',() => {
    $('search').select();
})

let findRegister = (target) =>{
    createObjectXhr('./tables/index.php?find='+target,table);
    createObjectXhr('./pass/index.php?find='+target,tablePass);
}
 
$('search').addEventListener('keyup',(e) => {
    table.style.display = 'block';    
    findRegister(e.target.value);
});

let openLink = (disabledSearchBar,target,event) =>{
    menuOcultar();
    let openNew = (add)=>{
        modal.style.display = "block";
        createObjectXhr(add,modal);
    };
    let getTable = (evt,add) =>{
        (evt == true) ? $('search').disabled = true : $('search').disabled = false;
        table.style.display ='block';
        createObjectXhr(add,table);
    };
    (event == undefined) ? getTable(disabledSearchBar,target) : $(event).addEventListener('click',openNew(target));
    document.getElementsByTagName('input')[0].focus();
}

// OPEN MODAL
let abrirmodal = (id,tb,typ) => {
    const modal = $("myModal");
    let frmData = new FormData();
    frmData.append('id',id);
    modal.style.display = "block";
    createObjectXhr(`./${tb}/${typ}.php`,modal,frmData);
}

//Toggle tabs links

let changeTab = (id) => {
    Array.from(document.getElementsByTagName('button')).map((e) => e.className = '');
    Array.from(document.getElementsByClassName('block')).map((e) =>{
        e.className = "block hide";
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
    (e.target.id == "links" || e.target.id == "linksMain") ? openLink(false,'./links/index.php') : "";
    (e.target.id == "pass" || e.target.id == "passMain") ? openLink(false,'./pass/index.php') : "";
    (e.target.id == "agenda" || e.target.id == "agendaMain") ? openLink(false,'./tables/index.php') : "";
    (e.target.id == "internas" || e.target.id == "internasMain") ? openLink(false,'./internas/index.php') : "";
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