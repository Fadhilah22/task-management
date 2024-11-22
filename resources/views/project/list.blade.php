<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel Project</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/css/project_list.css'])

</head>

<body>


@extends('main.main')

@section('title', 'mainpage')
@section('btnProfile')

@section('content')
<div class="main container project-block row">
    @php
        use App\Http\Controllers\UserController;

        $UserController = new UserController();
        $user = $UserController->getUser(session('user_id'));

        $projects = null;
            if(session()->has('user_id')){
                $projects = $user->projects()->get();
            }
    @endphp
    @if($projects != null)
        @foreach($projects as $project)
            <div class="main content project-block col">
                <h3>{{$project->title}}</h3>
                <h5>{{$project->description}}</h5>
                <p>{{$project->start_date}}</p>
            </div>
        @endforeach
    @endif
</div>
@endsection

</body>
</html>

