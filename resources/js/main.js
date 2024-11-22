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
    if(window.location.pathname === '/main'){
        const btnProfile = document.getElementById('btnProfile');
        btnProfile.addEventListener('click', redirect_profile);
        const user_id = btnProfile.value;
    }
    const btnHome = document.getElementById('navbarHead');
    const btnCreateProject = document.getElementById('btnCreateProject');

    btnHome.addEventListener('click', redirect_home);
    btnCreateProject.addEventListener('click', create_project);

    const btnDropDownProject = document.getElementById('btnDropDownProject');
    const projectContainer = document.getElementById('projectContainer');

    const collapse = new bootstrap.Collapse(projectContainer, {
        toggle: false // Disable automatic toggle
    });

    btnDropDownProject.addEventListener('click', () => toggle_drop_down(projectContainer, collapse));
}

function redirect_home(){
    window.location.href = `${window.location.origin}/`;
}

function redirect_register(){
    window.location.href = `${window.location.origin}/register`;
}

function redirect_login(){
    window.location.href = `${window.location.origin}/login`;
}

function redirect_profile(){
    console.log("profile/" + user_id);
    window.location.href = "profile/" + user_id;
}

function create_project(){
    window.location.href = `${window.location.origin}/project/create`;
}

function toggle_drop_down(projectContainer, collapse){
    collapse.toggle();
}
