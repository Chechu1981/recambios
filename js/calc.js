let referencia = document.getElementById('referencia');
let cantidad = document.getElementById('cantidad');
let pvp = document.getElementById('pvp');
let dto = document.getElementById('dto');
let subtotal = document.getElementById('subtotal');
let submit = document.getElementById('submit');

const calcular = () => {
    let operacion = 0;
    operacion = cantidad.value * pvp.value;
    operacion = (1 - (dto.value / 100)) * operacion;
    subtotal.value = Math.round(operacion * 100)/100;
}

const incluir = () => {
    let xhr;
    let ref = referencia.value;
    let pvp1 = pvp.value;
    let dto1 = dto.value;
    let sub1  = subtotal.value;
    if(window.XMLHttpRequest) xhr = new XMLHttpRequest();
    else xhr = new ActiveXObject("Microsoft.XMLHTTP");
    
    let datos = new FormData();
    datos.append("referencia",ref);
    datos.append("pvp",pvp1);
    datos.append("dto",dto1);
    datos.append("subtotal",sub1);
    xhr.open('POST','./calc/newLine.php');
    xhr.addEventListener('load',(dato) => {
        console.log(dato.target.response);
    });
    xhr.send(datos);
}

pvp.addEventListener('keyup',calcular);
cantidad.addEventListener('keyup',calcular);
dto.addEventListener('keyup',calcular);
submit.addEventListener('click',incluir);