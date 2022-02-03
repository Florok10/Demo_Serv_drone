@extends('layouts.app')
@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/event.css') }}">
</head>
<div class="containerE">
    <div class="titreE">
        <h1 class="salonE">{{ $event->title }}</h1>
        <div class="dateE">
        <p class="date">{{ $event->date }}</p>
        <p class="date">{{ $event->place }}</p>
        </div>
        <div class="rectangleBleu2"></div>
    </div>
    <div class="descriptionE">
        <p class="descriptionevent">Description:</p>
        <p>
            {{ $event->description }}
        </p>
    </div>
</div>
    <div class="logoContainer">
            <a href=""> <img src="{{ asset('images/header/facebook.svg') }}" alt="" class="imgReseau"></a>
            <a href=""> <img src="{{ asset('images/header/instagram.svg') }}" alt="" class="imgReseau"></a>
            <a href=""> <img src="{{ asset('images/header/twitter.svg') }}" alt="" class="imgReseau"></a>
    </div>
    <div>
    </div>

    <div class="slideshow-container">
        <div class="mySlides fade">
            <img src="{{ asset('images/events/3.jpg') }}" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="{{ asset('images/events/2.jpg') }}" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="{{ asset('images/events/1.jpg') }}" style="width:100%">
        </div>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        <div class="dots" style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
    </div>
    @endsection

    @section('script')
    <script>
        let slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
    showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
    showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");

        if (n > slides.length) {slideIndex = 1}

        if (n < 1) {slideIndex = slides.length}

        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }

        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }

        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
    }
    </script>
    @endsection
