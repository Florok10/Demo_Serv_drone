@extends('layouts.app')
@section('content')
<head>
    <link rel="stylesheet" href="{{asset('css/cartStyle.css')}}">
</head>
<section>
        <div class="container">
        @livewire('cart-page')
        </div>
</section>

@endsection
