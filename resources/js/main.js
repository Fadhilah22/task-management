console.log("Loaded");
load_script();

function load_script(){
  const btnRegister = document.getElementById('btnRegister');
  const btnLogin = document.getElementById('btnLogin');
    
  btnRegister.addEventListener('click', redirect_register);
  btnLogin.addEventListener('click', redirect_login);
  
}

function redirect_register(){
    window.location.href = "register";
}

function redirect_login(){
    window.location.href = "login"; 
}

// run dom 
document.addEventListener('DOMContentLoader', load_script);
