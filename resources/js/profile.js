console.log('Loaded');


load_script();

function load_script(){
    const btnEditProfile = document.getElementById('btnEditProfile');
    
    btnEditProfile.addEventListener('click', redirect_edit_profile);
}

function redirect_edit_profile(){
  const path = window.location.pathname.split('/');
  window.location.href = path[2]+'/edit';
}
