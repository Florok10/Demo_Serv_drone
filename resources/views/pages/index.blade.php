@extends('layouts.app')

@section('content')

    <head>
        <link type="text/css" rel="stylesheet" href="{{ asset('css/index.css') }}">
    </head>

    <section class="header">
        <div class="h1-desc-container">
            <h1>SERV'DRONE</h1>
            <p>La technologie au service du quotidien. Avec serv’drone, facilitez votre vie dans le moindre détail.</p>
        </div>
        <div class="container-links-social">
            <a href="#"><img src="{{ asset('images/header/facebook.svg')}}" alt=""></a>
            <a href="#"><img src="{{ asset('images/header/instagram.svg')}}" alt=""></a>
            <a href="#"><img src="{{ asset('images/header/twitter.svg')}}" alt=""></a>
        </div>
    </section>

    <section class="three-img">
        <h2>Titre</h2>
        <div class="img-container">
            <div>
                <img class="example-images" src="{{ asset('images/home/s1.jpg')}}" alt="">
                <h3 class="h3-titles-examples">Lorem ipsum</h3>
                <p class="p-examples">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare elementum odio nisi, mattis tortor nullam.</p>
            </div>
            <div>
                <img class="example-images" src="{{ asset('images/home/s2.jpg')}}" alt="">
                <h3 class="h3-titles-examples">Lorem ipsum</h3>
                <p class="p-examples">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare elementum odio nisi, mattis tortor nullam.</p>
            </div>
            <div>
                <img class="example-images" src="{{ asset('images/home/s3.jpg')}}" alt="">
                <h3 class="h3-titles-examples">Lorem ipsum</h3>
                <p class="p-examples">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare elementum odio nisi, mattis tortor nullam.</p>
            </div>
        </div>
    </section>

    <section class="wave">
        <h2>Serv’Drone</h2>
        <div>
            <div class="reveal">
                <p>Ultrices senectus a cursus vehicula donec ac lacus. Duis tempor in purus porta in tristique mi. Urna massa quisque tellus fames cursus. Mauris, aenean aenean fringilla maecenas at. Nisl enim, scelerisque elit donec tempus. Enim senectus consectetur diam vulputate. Quis sodales proin donec consequat.</p>
                <p>Ultrices senectus a cursus vehicula donec ac lacus. Duis tempor in purus porta in tristique mi. Urna massa quisque tellus fames cursus. Mauris, aenean aenean fringilla maecenas at. Nisl enim, scelerisque elit donec tempus. Enim senectus consectetur diam vulputate. Quis sodales proin donec consequat.</p>
            </div>
            <form id="slider">
                <input type="radio" name="slider" id="s1" checked>
                <input type="radio" name="slider" id="s2">
                <input type="radio" name="slider" id="s3">

                <label for="s1" id="slide1"></label>
                <label for="s2" id="slide2"></label>
                <label for="s3" id="slide3"></label>
            </form>
        </div>
    </section>
    <section class="wave-bottom">
        <img src="{{ asset('images/home/wave.png')}} " alt="">
        <h2>Pourquoi nous ?</h2>
        <span></span>
    </section>

    <section class="abrahima">
        <div>
            <div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Arcu, leo, aenean mauris ut magna euismod libero adipiscing a. Tristique ultricies nunc interdum scelerisque et, ipsum nibh. Quisque scelerisque scelerisque auctor pretium in nec etiam faucibus amet. Aliquet ut eget volutpat enim enim.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Arcu, leo, aenean mauris ut magna euismod libero adipiscing a. Tristique ultricies nunc interdum scelerisque et, ipsum nibh. Quisque scelerisque scelerisque auctor pretium in nec etiam faucibus amet. Aliquet ut eget volutpat enim enim.</p>
            </div>
            <img class="brahima" src="{{ asset('images/home/ibrahima.jpg')}}" alt="">
        </div>
    </section>

    <section class="partners">
        <h2>NOS PARTENAIRES</h2>
        <div>
            <img src="{{ asset('images/home/partner1.png')}}" alt="">
            <img src="{{ asset('images/home/partner2.png')}}" alt="">
            <img src="{{ asset('images/home/partner3.png')}}" alt="">
        </div>
    </section>

@endsection
