@extends('layouts.app')
@section('content')
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/createEvent.css') }}">
</head>



<section class="create-event-section">
    <div class="h1_container">
        <div class="blue_rectangle"></div>
        <h1>Créer un événement</h1>
    </div>

    @if($errors->any())
    @foreach ($errors->all() as $error)
        <div class="errors">{{ $error  }}</div>
    @endforeach
@endif
            <!-- start form -->
    <form class="form" action="{{ route('event.store') }}" class="w-50" method="POST">

        @csrf

        <div class="form-group">
            <label for="">Titre</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="form-group">
            <span>Du</span>
            <input type="date" class="form-control" name="date_start">
        </div>

        <div class="form-group">
            <span>au</span>
            <input type="date" class="form-control" name="date_end">
        </div>

        <div class="form-group">
            <span>Lieu</span>
            <input type="text" name="place" class="form-control">
        </div>

        <div class="form-group">
            <span>Description</span>
            <input type="textarea" name="description" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">Ajouter</button>
        </div>
    </form>
</section>
@endsection
