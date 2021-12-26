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
    .then(response => (response.ok == true) ? response.text(): $('myModal').childNodes[1].innerHTML = '<img src="./img/spinner.svg">')
    .then((str) => {
        domPrint.innerHTML = str;
        (target.search('update.php') != -1 || target.search('insert.php') != -1 || target.search('eliminar.php') != -1) ? 
        openLink(false,'./'+target.split('/')[1]+'/' + target.split('/')[2] + '/index.php'):
        '';
    })
    .catch(error => console.log("el error es: " + error));
}

function getSelect(target,domPrint,data){
    tablePass.innerHTML = '';
    let isModal = true;
    (domPrint == modal) ? domPrint = modal.firstElementChild : isModal = false;
    fetch(target,{
        method: 'POST',
        body: data,
    })
    .then(response => (response.ok == true) ? response.text(): 'cargando datos. Espere.....')
    .catch(error => console.log("el error es: " + error));
}

//LOAD HOME
let firstPage = () => {
    $('search').disabled = false;
    $('search').parentElement.style.width = "70%";
    createObjectXhr('./main/cards.php',table);
    history.pushState({foo:"agenda"},'event','./');
}
firstPage();

// SEARCH
$('search').addEventListener('click',() => {
    $('search').select();
})

let findRegister = (target) =>{
    createObjectXhr('./tables/schedule/index.php?find='+target,table);
    createObjectXhr('./tables/pass/index.php?find='+target,tablePass);
}

const showDiv = (value) => {
    const list = $('showSearh').appendChild(document.createElement('ul'));
    fetch('./tables/schedule/json.php?find='+value)
    .then(response => (response.ok == true) ? response.text(): $('myModal').childNodes[1].innerHTML = '<img src="./img/spinner.svg">')
    .then(result =>{
        const arr = JSON.parse(result);
        arr.map(e=>{
            list.appendChild(document.createElement('li')).append(`${e.proveedor.toUpperCase()} - ${e.marca.toUpperCase()} - ${e.contact.toUpperCase()} - ${e.ciudad.toUpperCase()}`);
            list.classList = "listSearch";
        });
    });    
}
 
$('search').addEventListener('keyup',(e) => {
    table.style.display = 'block';  
    //findRegister(e.target.value);
    ($('showSearh').firstChild == null)?'':$('showSearh').removeChild($('showSearh').firstChild);
    (e.target.value.length > 0)?showDiv(e.target.value):'';
});

let openLink = (disabledSearchBar,target,event,txtHistory) =>{
    menuOcultar();
    let openNew = (add)=>{
        modal.style.display = "block";
        createObjectXhr(add,modal);
    };
    let getTable = (evt,add) =>{
        if(evt == true){
            $('search').disabled = true;
            $('search').parentElement.style.width = "0px";
        }else{
            $('search').disabled = false;
            $('search').parentElement.style.width = "70%";
        } 
        table.style.display ='block';
        createObjectXhr(add,table);
    };
    (event == undefined) ? getTable(disabledSearchBar,target) : $(event).addEventListener('click',openNew(target));
    document.getElementsByTagName('input')[0].focus();
    history.pushState({foo:"agenda"},'event',txtHistory);
}

// OPEN MODAL
let abrirmodal = (id,tb,typ) => {
    const modal = $("myModal");
    let frmData = new FormData();
    frmData.append('id',id);
    modal.style.display = "block";
    createObjectXhr(`./tables/${tb}/${typ}.php`,modal,frmData);
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

let fileLoad = () => {
    const inptFile = $('file');
    (inptFile.value != '') ? inptFile.style.display = 'none' : '';
    $('file').click();
}

// LISTEN CLICKS
document.body.addEventListener('click',(e)=>{
    ($('showSearh').firstChild == null)?'':$('showSearh').removeChild($('showSearh').firstChild);
    (e.target.id == "new") ? openLink(true,'./tables/schedule/nuevo.php','new') : "";
    (e.target.id == "passNew") ? openLink(true,'./tables/pass/nuevo.php','passNew') : "";
    (e.target.id == "linkNew") ? openLink(true,'./tables/links/nuevo.php','linkNew') : "";
    (e.target.id == "intNew") ? openLink(true,'./tables/internas/nuevo.php','intNew') : "";
    (e.target.id == "calc" || e.target.id == "calcMain") ? openLink(true,'./calc/calc.php',undefined,'Buscadora') : "";
    (e.target.alt == "ocasionplus") ? firstPage(false) : "";
    (e.target.id == "edit") ? abrirmodal(e.target.alt,'schedule','modificar') : "";
    (e.target.id == "Pedit") ? abrirmodal(e.target.alt,'pass','modificar') : "";
    (e.target.id == "Ledit") ? abrirmodal(e.target.alt,'links','modificar') : "";
    (e.target.id == "Iedit") ? abrirmodal(e.target.alt,'internas','modificar') : "";
    (e.target.id == "links" || e.target.id == "linksMain") ? openLink(false,'./tables/links/index.php',undefined,'enlaces') : "";
    (e.target.id == "pass" || e.target.id == "passMain") ? openLink(false,'./tables/pass/index.php',undefined,'contrasenas') : "";
    (e.target.id == "agenda" || e.target.id == "agendaMain") ? openLink(false,'./tables/schedule/index.php',undefined,'agenda-de-contactos') : "";
    (e.target.id == "internas" || e.target.id == "internasMain") ? openLink(false,'./tables/internas/index.php',undefined,'ordenes-internas') : "";
    (e.target.id == "info") ? abrirmodal(e.target.alt,'schedule','modal') : "";
    (e.target.id == "Pinfo") ? abrirmodal(e.target.alt,'pass','modal') : "";
    (e.target.id == "closeModal") ? $("myModal").style.display = "none" : "";
    (e.target.id == "myModal") ? $("myModal").style.display = "none" : "";
    (e.target.name == "linkButton") ? changeTab(e.target.innerText) : "";
    (e.target.id == "documents") ? openLink(false,'./tables/documents/index.php',undefined,'documentos') : "";
    (e.target.id == "documentsNew") ? openLink(false,'./tables/documents/nuevo.php','documentsNew') : "";
    (e.target.id == "Dinfo") ? abrirmodal(e.target.alt,'documents','modal') : "";
    (e.target.id == "DocEdit") ? abrirmodal(e.target.alt,'documents','modificar') : "";
    (e.target.id == "Dedit") ? abrirmodal(e.target.alt,'address','modificar') : "";
    (e.target.id == "center") ? openLink(false,'./tables/address/index.php',undefined,'direcciones-de-centros') : "";
    (e.target.id == "centNew") ? openLink(true,'./tables/address/nuevo.php','centNew') : "";
    (e.target.id == "btnUpload") ? fileLoad() : "";
});

// HAMB ICON CLICK ACCION
const menuOcultar = () => {
    $('hamb').classList.toggle('animation');
    $('nav-body').classList.toggle('animation');
    const counte = document.getElementsByClassName('item-link');
    for(let i = 0; i < counte.length;i++){
        counte[i].classList.toggle('animation');
    }
}

const hamburguer = $('hamb').addEventListener('click',menuOcultar);

//MENU CLICK

const btnNewHidden = () => {
    const btnNew = document.getElementsByClassName("new");
    const imgArrow = document.getElementsByClassName("down-menu");
    for(let i = 0; i < btnNew.length; i++){
        btnNew[i].className = "new newHidden";
        imgArrow[i].className = "down-menu";
    }
}

$('nav-body').addEventListener('click',function(e){
    (e.target.localName == "img")?e.target.classList.toggle('down-menu-rotate'):'';
    (e.target.className == "down-menu down-menu-rotate")?e.target.parentElement.parentElement.childNodes[3].classList.toggle('newHidden'):btnNewHidden();
 });

// COPIAR EN PORTAPAPELES
let copiar = (id) =>{
    let texto = $(id);
    texto.style = "display: block";
    texto.select();
    document.execCommand("copy");
    texto.style = "display:none";
}