@extends('layouts.app')
@section('content')
<head>
    <link rel="stylesheet" href="{{asset('css/history.css')}}">
</head>
<div class="histoireContainer">
    <div class="h1_container">
        <div class="blue_rectangle"></div>
        <h1>Histoire des drones</h1>
    </div>

    <div class="anciennePhoto">
        <img src="{{asset('images/history/Groupe1.jpg')}}" alt="">
        <div class="texteDrone">
            <h2>Titre</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare elementum odio nisi, mattis tortor nullam. Metus turpis tortor donec bibendum in sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare elementum odio nisi, mattis tortor nullam. Metus turpis tortor donec bibendum in sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare elementum odio nisi, mattis tortor nullam. Metus turpis tortor donec bibendum in sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare elementum odio nisi, mattis tortor nullam. Metus turpis tortor donec bibendum in sem.  </p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare elementum odio nisi, mattis tortor nullam. Metus turpis tortor donec bibendum in sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare elementum odio nisi, mattis tortor nullam. Metus turpis tortor donec bibendum in sem. Lorem ipsum dolor sit amet, consectetur </p>
        </div>
    </div>

    <div class="anciennePhoto">
        <img class="none" src="{{asset('images/history/Groupe3.jpg')}}" alt="">
        <div class="texteDrone">
        <h2>Titre</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare elementum odio nisi, mattis tortor nullam. Metus turpis tortor donec bibendum in sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare elementum odio nisi, mattis tortor nullam. Metus turpis tortor donec bibendum in sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare elementum odio nisi, mattis tortor nullam. Metus turpis tortor donec bibendum in sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare elementum odio nisi, mattis tortor nullam. Metus turpis tortor donec bibendum in sem.  </p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare elementum odio nisi, mattis tortor nullam. Metus turpis tortor donec bibendum in sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare elementum odio nisi, mattis tortor nullam. Metus turpis tortor donec bibendum in sem. Lorem ipsum dolor sit amet, consectetur </p>
    </div>
    <img class="true" src="{{asset('images/history/Groupe3.jpg')}}" alt="">
    </div>


    <div class="anciennePhoto">
        <img src="{{asset('images/history/Groupe2.jpg')}}" alt="">
        <div class="texteDrone">
            <h2>Titre</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare elementum odio nisi, mattis tortor nullam. Metus turpis tortor donec bibendum in sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare elementum odio nisi, mattis tortor nullam. Metus turpis tortor donec bibendum in sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare elementum odio nisi, mattis tortor nullam. Metus turpis tortor donec bibendum in sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare elementum odio nisi, mattis tortor nullam. Metus turpis tortor donec bibendum in sem.  </p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare elementum odio nisi, mattis tortor nullam. Metus turpis tortor donec bibendum in sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare elementum odio nisi, mattis tortor nullam. Metus turpis tortor donec bibendum in sem. Lorem ipsum dolor sit amet, consectetur </p>
        </div>
    </div>

    <div class="logo-container">
        <a href=""><img src="{{asset('images/history/facebookh.svg')}}" alt=""></a>
        <a href=""><img src="{{asset('images/history/instagramh.svg')}}" alt=""></a>
        <a href=""><img src="{{asset('images/history/twitterh.svg')}}" alt=""></a>
    </div>
</div>
@endsection
