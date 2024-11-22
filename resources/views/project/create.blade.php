
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel Project</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/project_create.css', 'resources/js/project_create.js'])

</head>

<body>

<?php
    $message = null;
    if(session()->has('success')){
        $message = session('success');
    }
?>

@extends('main.main')

@section('title', 'create project')
@section('btnProfile')
@section('content')
@if($message != null)
    <div class= "message success-message">
        <p>{{$message}}</p>
    </div>
@endif
<form action="{{ route('project.store') }}" method="post">
    @csrf
    <label for="title">
        <input class="input project" type="text" name="title" value="" placeholder="Input project title">
    </label>
    </br>
    <label for="description">
        <textarea class="input project" type="textarea" name="description" value="" placeholder="Input project description"></textarea>
    </label>
    </br>
    <label for="status">
        <input class="input status d-none" type="text" name="status" value="" id="statusField">
        <div class="row" id="statusRow">
            <div class="col-md-4">
                <p>not started</p>
                <button type="button" class="opt" id="optNotStarted">not started</button>
            </div>

            <div class="col-md-4 ms-2">
                <p>on going</p>
                <button type="button" class="opt" id="optOngoing">on going</button>
            </div>
        </div>
    </label>
    </br>
    <label for="priority">
        <input class="input priority d-none" type="number" name="priority" value="" id="priorityField">
        <div class="row" id="priorityRow">
            <div class="col-md-2">
                <p>low</p>
                <button type="button" class="opt" id="optLow">low</button>
            </div>

            <div class="col-md-2 ms-2">
                <p>medium</p>
                <button type="button" class="opt" id="optMedium">medium</button>
            </div>

            <div class="col-md-2 ms-2">
                <p>high</p>
                <button type="button" class="opt" id="optHigh">high</button>
            </div>

            <div class="col-md-2 ms-2">
                <p>critical</p>
                <button type="button" class="opt" id="optCritical">critical</button>
            </div>

            <div class="col-md-2 ms-2">
                <p>urgent</p>
                <button type="button" class="opt" id="optUrgent">urgent</button>
            </div>
        </div>
    </label>
    </br>
    <label for="start_date">
        <p>start date</p>
        <input type="date" name="start_date" id="stDateField">
    </label>
    </br>
    <label for="end_date">
        <p>end date</p>
        <input type="date" name="end_date" id="edDateField">
    </label>
    <label for="created_by">
        <input class="input_created_by d-none" type="text" name="created_by" id="createdByField" value="{{ session('user_id'); }}">
    </label>
    </br>
    <button type="submit">Create Project</button>
</form>

@endsection

</body>
</html>
