const btnLogin = document.getElementById('btn_login');
const btnRegister = document.getElementById('btn_register');
const forms = document.getElementById('forms');
const sidebar = document.getElementById('sidebar');


btnLogin.addEventListener('click',()=>{
cambiarLogin();
});

btnRegister.addEventListener('click',()=>{
cambiarRegister();
});

function cambiarLogin(){
    forms.classList.remove('active');
    sidebar.classList.remove('active');
}

function cambiarRegister(){
    forms.classList.add('active');
    sidebar.classList.add('active');
}