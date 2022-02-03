@extends('layouts.app')

@section('content')

<head>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/products.css')}}">
</head>

<div class="h1_container">
    <div class="blue_rectangle"></div>
    <h1>Nos drones</h1>
</div>

<div class="nosDrones">

    @foreach ($products as $product)

    <div class="cards">
        <div class="cards_content">
            <img class="cards_image" src="{{ Storage::url($product->picture_path) }}" alt="Product picture">
            <h2 class="cards_name">{{ stripslashes($product->name) }}</h2>
            <a class="href_details" type="button" href="/products/product-detail/{{$product->id}}">En savoir plus</a>
        </div>
    </div>

    @endforeach

</div>
@endsection

