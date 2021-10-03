let $ = (target) => document.getElementById(target);
const entrar = () =>{
    let name = $('usuario');
    let coment = $('coment');
    let pass = $('pass');
    
    (name.value === 'jesus' && pass.value === 'ocasionplus')? location.href = './connection/login_controller.php?user=' + name.value + '&pass=' + pass.value : coment.innerHTML = "no entra " + name.value;
}

document.body.addEventListener('click', (e) => {
    (e.target.id == 'btnEntrar') ? entrar() : "";
});

document.body.addEventListener('keyup',(e) => {
    (e.key == "Enter") ? entrar() : "";
})
$('usuario').focus();