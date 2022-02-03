@extends('layouts.app')

@section('content')

<head>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/product.css') }}">
</head>
<section class="product-container">
    <img src="{{ Storage::url($product->picture_path )}}" alt="">
    <div>
        <div class="product-name-title_container">
            <div id="name-rectangle_container">
                <h1>{{ stripslashes($product->name) }}</h1>
            </div>
            <h2>{{ stripslashes($product->title) }}</h2>
        </div>
        <div>
            <p>{{stripslashes($product->productDescription->first_description)}}</p>
        </div>
        <div class="button">
            @if ($cart->where('id', $product->id)->count())
                <a class="already-in-cart">Déjà dans le panier</span>
            @else
            @if ($product->stock->available_product_amount > 1)
            <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" class="submit-btn-add-cart">
                    Ajouter au panier
                </button>
            </form>
            @else
            <span class="no-stock">Cet article n'est plus en stock</span>
            @endif
            @endif
            <a href="{{ route('contact.create') }}">Contactez nous</a>
            <a href="#scroll">Descriptif technique</a>
        </div>
    </div>
</section>

<section class="three-img">
    <img class="hvr-pulse" src="./img/arrow.svg" alt="">
    <h2>Fonctionnalités</h2>
    <div class="img-container">
        <div>
            <img src="{{ asset('images/product_detail/drone.svg')}}" alt="">
            <h3>Lorem ipsum</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare elementum odio nisi, mattis tortor nullam.</p>
        </div>
        <div>
            <img src="{{ asset('images/product_detail/go-pro.svg')}}" alt="">
            <h3>Lorem ipsum</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare elementum odio nisi, mattis tortor nullam.</p>
        </div>
        <div>
            <img src="{{ asset('images/product_detail/dog-sitting.svg')}}" alt="">
            <h3>Lorem ipsum</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare elementum odio nisi, mattis tortor nullam.</p>
        </div>
    </div>
</section>

<section class="drone-full">
    <img src="./img/drone-full.jpg" alt="">
</section>

<section class="product-info">
    <div>
        <h2>Infos</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare elementum odio nisi, mattis tortor nullam. Metus turpis tortor donec bibendum in sem. Lectus urna id massa neque, sagittis fames lacus dignissim. Mauris nunc mauris tempus faucibus adipiscing consectetur ac blandit quam.</p>
    </div>
    <img src="./img/drone-medic.png" alt="">
</section>

<section class="caracteristics" id="scroll">

        <h2>Caractéristiques</h2>
        <div>
            <ul>
                <li>Services</li>
                <li>Services</li>
                <li>Services</li>
                <li>Services</li>
            </ul>
            <ul>
                <li>Services</li>
                <li>Services</li>
                <li>Services</li>
                <li>Services</li>
            </ul>
            <ul>
                <li>Services</li>
                <li>Services</li>
                <li>Services</li>
                <li>Services</li>
            </ul>
        </div>
</section>

<section class="app">
    <div>
        <h2>Notre application gratuite</h2>
        <span></span>
    </div>
    <div>
        <div class="appdrone">
            <img src="./img/droneapp.png" alt="">
            <span>SERV'DRONE</span>
        </div>
        <div class="download">
            <img src="./img/applestore.jpg" alt="">
            <img src="./img/googleplay.jpg" alt="">
        </div>
    </div>
</section>
@endsection
