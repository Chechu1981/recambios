const entrar = () =>{
    let name = document.getElementById('usuario');
    let coment = document.getElementById('coment');
    let pass = document.getElementById('pass');

    (name.value === 'jesus' && pass.value === 'ocasionplus')? location.href = './connection/login_controller.php?user=' + name.value + '&pass=' + pass.value : coment.innerHTML = "no entra " + name.value;
}

document.body.addEventListener('click', (e) => {
    (e.target.id == 'btnEntrar') ? entrar() : "";
});

document.body.addEventListener('keyup',(e) => {
    (e.key == "Enter") ? entrar() : "";
})
document.getElementById('usuario').focus();