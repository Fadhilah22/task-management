console.log("Loaded");

let user_id = null;
let page = null;

if(window.appConfig != null ) {
    user_id = window.appConfig.userId;
    page = window.appConfig.page;
}

console.log(user_id);

if(user_id == null){
    load_script_guess();
} else {
    load_script_user();
}

function load_script_guess(){
  const btnRegister = document.getElementById('btnRegister');
  const btnLogin = document.getElementById('btnLogin');

  btnRegister.addEventListener('click', redirect_register);
  btnLogin.addEventListener('click', redirect_login);

}

function load_script_user(){
  console.log(page);
  if(page === 'main'){
    const btnProfile = document.getElementById('btnProfile');
    btnProfile.addEventListener('click', redirect_profile);
    const user_id = btnProfile.value;
  }
}

function redirect_register(){
    window.location.href = "register";
}

function redirect_login(){
    window.location.href = "login"; 
}

function redirect_profile(){
    console.log("profile/" + user_id);
    window.location.href = "profile/" + user_id;
}
