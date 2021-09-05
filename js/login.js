const entrar = () =>{
    let name = document.getElementById('usuario');
    let coment = document.getElementById('coment');
    let pass = document.getElementById('pass');

    (name.value === 'jesus' && pass.value === 'ocasionplus')? location.href = './connection/login_controller.php?user=' + name.value : coment.innerHTML = "no entra " + name.value;
}

let btn = document.getElementById('btnEntrar')
btn.addEventListener('click', entrar)