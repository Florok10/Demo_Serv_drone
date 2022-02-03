@extends('layouts.app')

@section('content')

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/panelAdmin.css')}}">
    </head>

    <style>
        ul {
            padding-left: 0;
        }

        a {
            text-decoration: none;
        }
    </style>

    <div id="btn-main-container">
        <button id="btn-users" class="btn-lg">Utilisateurs</button>
        <button id="btn-products" class="btn-lg">Produits</button>
        <button id="btn-events" class="btn-lg">Événements</button>
        <button id="btn-orders" class="btn-lg">Commandes</button>
    </div>

    <div id="users-container" class="livewire-containers">
        @livewire('users')
    </div>

    <div id="products-container" class="livewire-containers hide-containers">
        <a href="/add-product" type="button" class="btn btn-dark">Ajouter un produit</a>
        @livewire('products')
    </div>

    <div id="events-container" class="livewire-containers hide-containers">
        <a href="/add-event" type="button" class="btn btn-dark">Ajouter un évenements</a>
        @livewire('events')
    </div>

    {{-- <div id="orders-container" class="livewire-containers hide-containers">
        @livewire('orders')
    </div> --}}

@endsection

@section('script')

<script>
    const btnUsers = document.getElementById("btn-users");
    const btnProducts = document.getElementById("btn-products");
    const btnEvents = document.getElementById("btn-events");
    const btnOrders = document.getElementById("btn-orders");

    const usersContainer = document.getElementById("users-container");
    const productsContainer = document.getElementById("products-container");
    const eventsContainer = document.getElementById("events-container");
    const ordersContainer = document.getElementById("orders-container");

    btnUsers.addEventListener('click', () => {
        usersContainer.classList.remove("hide-containers");
        productsContainer.classList.add("hide-containers");
        eventsContainer.classList.add("hide-containers");
        ordersContainer.classList.add("hide-containers");
    });

    btnProducts.addEventListener('click', () => {
        productsContainer.classList.remove("hide-containers");
        usersContainer.classList.add("hide-containers");
        eventsContainer.classList.add("hide-containers");
        ordersContainer.classList.add("hide-containers");
    });

    btnEvents.addEventListener('click', () => {
        eventsContainer.classList.remove("hide-containers");
        usersContainer.classList.add("hide-containers");
        productsContainer.classList.add("hide-containers");
        ordersContainer.classList.add("hide-containers");
    });

    btnOrders.addEventListener('click', () => {
        ordersContainer.classList.remove("hide-containers");
        usersContainer.classList.add("hide-containers");
        productsContainer.classList.add("hide-containers");
        eventsContainer.classList.add("hide-containers");
    });
</script>

@endsection
