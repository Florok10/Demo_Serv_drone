@extends('layouts.app')
@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/events.css') }}">
</head>
<div class="evenements_container">
    <div class="h1_container">
        <div class="blue_rectangle"></div>
        <h1>Evénements</h1>
    </div>

    @foreach($events as $event)

    <div class="Ecard_container">
        <div class="Ecard hvr-grow">
            <div class="Ecard_content">
                <p class="content_title">{{ $event->title }}</p>
                <p>{{ $event->description }}</p>
                <p>{{ $event->date }}</p>
                <a type="button" href="/events/event-detail/{{ $event->id }}">Plus</a>
            </div>
        </div>
    </div>

    @endforeach
@endsection
