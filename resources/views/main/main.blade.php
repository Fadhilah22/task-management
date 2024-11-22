
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel Project</title>
    @yield('title', 'masterpage')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/css/main.css', 'resources/js/main.js'])
</head>

<body>

@php
use App\Http\Controllers\UserController;

$user = null;
$page = 'main';
$projects = null;

if(session()->has('user_id')){
  if($user == null){
    $UserController = new UserController();
    $user = $UserController->getUser(session('user_id'));
  }
}
@endphp

    <div class="container-fluid">
      <div class="row 1">

        <div class="col-md-2">
          <div class="navbar head" id="navbarHead">
            <div class="logo">
                <h2>have logo here</h2>
            </div>
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
                <button class="btn btn-primary mx-2" id="btnProfile" value="{{ $user->id }}" onclick="window.location = '{{URL::route('profile.show', ['user_id' => $user->id])}}'"></button>
              @endif
              </div>

          </div>
        </div>

      </div>

      <div class="row 2">

          <div class="col-md-2">
                <div class="sidebar container">
                    <div>
                        @if ($user == null)
                            <h4> you have not logged in </h4>
                        @else
                            <h4> hello {{$user->full_name}} </h4>
                        @endif
                    </div>

                    <div>
                        @if(session()->has('user_id'))
                            <button type="" id="btnCreateProject" >Create new project</button>
                        @else
                            <p>you have to log in to create project</p>
                        @endif
                    </div>

                    <div class="sidebar project-section">
                        <div class="sidebar project-section header" id="btnDropDownProject">
                            <h5>Projects list</h5>
                            <i class="fa fa-caret-down" aria-hidden=true></i>
                        </div>
                        <div class="sidebar project-section project-container" id="projectContainer">
                            @php
                                if(session()->has('user_id')){
                                    $projects = $user->projects()->get();
                                }
                            @endphp
                            @if($projects != null)
                                @foreach($projects as $project)
                                    <p class="sidebar project-section project">{{$project->title}}</p>
                                @endforeach
                            @endif
                        </div>
                    </div>
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
