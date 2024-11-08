
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel Project</title>
    @yield('title', 'masterpage')
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/main.css', 'resources/js/main.js'])

</head>

<body>

<?php
use App\Models\User;

$user = null;
$page = 'main';

if(session()->has('user_id')){
  if($user == null){
    $user = User::find(session('user_id'));
  }
}
?>

    <div class="container-fluid">
      <div class="row 1">

        <div class="col-md-2">
          <div class="navbar head">
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

              <div class="title-container">
                <h1 class="text-center mx-5">Project Management App</h1>
              </div>

              @if ($user == null)
              <div class="buttons-container d-flex align-items-center"> <button class="mx-2" id="btnRegister">Register</button>
                <button class="mx-2" id="btnLogin">Login</button>
                @else
                @yield('btnProfile')
                <button class="btn btn-primary mx-2" id="btnProfile" value="{{ $user->id }}"></button>
              @endif
              </div>

          </div>
        </div>

      </div>

      <div class="row 2">

          <div class="col-md-2">
            <div class="navbar project">
                lists of projects functionality here
            </div>
            <div>
                @if(session()->has('user_id'))
                <button type="" id="btnCreateProject">Create new project</button>
                @else
                <p>you have to log in to create project</p>
                @endif
            </div>
          </div>

          <div class="col-md-10">
            <div class="block content">
                main content here
                @yield('content')
            </div>
          </div>

      </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    @if ($user != null)
    <script>
        window.appConfig = {
          userId: @json($user->id),
          page: @json($page ?? 'main')
        };
    </script>
    @else
    <script>
        window.appConfig = null;
    </script>
    @endif

</body>
</html>
