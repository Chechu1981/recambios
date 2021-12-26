let $ = (target) => document.getElementById(target);

const entrar = () =>{
    let name = $('usuario').value;
    let coment = $('coment');
    let pass = $('pass').value;
    let frIniData = new FormData();
    frIniData.append('user',name);
    frIniData.append('password',pass);

    fetch('./users.php',{
        method: 'POST',
        body: frIniData,
    })
    .then(response => response.text())
    .then(data => {
        (data == 'true') ? location.href = './connection/login_controller.php?user=' + name + '&pass=' + pass : coment.innerHTML = "Usuario o contraseña no válidos";
    });
}

document.body.addEventListener('click', (e) => {
    (e.target.id == 'btnEntrar') ? entrar() : "";
});

document.body.addEventListener('keyup',(e) => {
    (e.key == "Enter") ? entrar() : "";
})
$('usuario').focus();