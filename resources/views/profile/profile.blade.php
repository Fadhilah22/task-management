
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel Project</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/js/profile.js'])

</head>

<body>

<?php
    use App\Models\User;

    $page = 'profile';
    $user = User::find(session('user_id'));

?>

@extends('main.main')

@section('title', 'profile')
@section('btnProfile')
@section('content')
    <h1>{{ $user->full_name }}</h1>
    <h3>{{ $user->username }}</h3>
    <h3>{{ $user->email }}</h3>
    <button type="" class= "btn btn-primary" id="btnEditProfile">edit profile</button>
@endsection

<script>
    window.appConfig = {
        userId: @json($user->id)
    };
</<script>

</script>

</body>
</html>

