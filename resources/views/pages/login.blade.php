@extends('layouts.app')

@section('content')
    <section>
        <div class="inscription-img"></div>
        <div class="inscription-form">
            <div class="connection">
                <h2>Identifiez-vous</h2>
                <div class="connection-items">
                        <input type="text" placeholder="E-mail*">
                        <input type="password" placeholder="Mot de passe*">
                </div>
                <div class="send-button">
                    <a href="./index.html">Connexion</a>
                </div>
            </div>
            <div class="inscription">
                <h2>Nouveau client</h2>
                <div class="send-button">
                    <a href="./inscription.html">S'inscrire</a>
                </div>
            </div>
        </div>
    </section>
@endsection
