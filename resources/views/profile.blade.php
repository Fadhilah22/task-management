
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel Project</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['']) 
    
</head>

<body>

<?php
    $page = 'profile';
?>

@extends('main.main')

@section('title', 'profile')
@section('btnProfile')
@section('content')
    <h2>This is the Child Page Content</h2>
    <p>This content will be displayed in the main content area of the master layout.</p>
@endsection

</body>
</html>

