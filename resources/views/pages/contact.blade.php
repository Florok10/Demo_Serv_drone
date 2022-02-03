@extends('layouts.app')
@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/contactStyle.css') }}">
</head>
<section>
    <div class="contact">
        <div class="contact-form">
            <div class="h1_container">
                <div class="blue_rectangle"></div>
                <h1>Contact</h1>
            </div>
            {!! Session::has('msg') ? Session::get("msg") : '' !!}
            <form action="{{ route('contact.store') }}" method="POST" class="contact-items">
                @csrf
                @auth
                    <input type="text" value="{{Auth::user()->name}}" readonly="readonly" name="last_name">
                    <input type="text" value="{{Auth::user()->first_name}}" readonly="readonly" name="first_name">
                    <input type="email" value="{{Auth::user()->email}}" readonly="readonly" name="email">
                    <input type="text" placeholder="Objet du message*" name="object">
                    <input type="text" placeholder="Message*" name="message">
                @else
                    <input type="text" placeholder="Nom*" name="last_name">
                    <input type="text" placeholder="Prénom*" name="first_name">
                    <input type="email" placeholder="Email*" name="email">
                    <input type="text" placeholder="Objet du message*" name="object">
                    <input type="textarea" placeholder="Message*" name="message">
                @endauth
                <div class="cgu">
                    <input type="checkbox" name="term">
                    <span>Je confirme avoir pris connaissance des <a href="#"><strong>CGU</strong></a></span>
                </div>
                <div class="send-button">
                    <button type="submit">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
    <img src="{{asset('images/contact/img-contact.jpg')}}" alt="Illustration image">
</section>
@endsection
