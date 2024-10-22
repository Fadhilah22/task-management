
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel Project</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/main.css', 'resources/js/main.js']) 
    
</head>

<body>

<?php
use App\Models\User;

$user = null;

if(session()->has('user_id')){
  if($user == null){
    $user = User::find(session('user_id'));
  }
}
?>

    <div class="container-fluid">
      <div class="row">
        
        <div class="col-md-2">
          <div class="navbar project">
              <h3>have logo here</h3>
              @if ($user == null)
              <p> you have not logged in </p>
              @else 
               <p> hello {{$user->full_name}} </p> 
              @endif
          </div>
        </div>

        <div class="col-md-10">
          <div class="navbar user d-flex justify-content-center align-items-center">
              <h1 class="text-center mx-5">Project Management App</h1>
              @if ($user == null)
              <button class="btn btn-primary mx-2" id="btnRegister">Register</button>
              <button class="btn btn-primary mx-2" id="btnLogin">Login</button>
              @else
              <button class="profile-button" id="btnProfile"></button>
              @endif
          </div>
        </div>
        
      </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
