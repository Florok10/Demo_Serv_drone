@extends('layouts.app')

@section('content')
    <head>
        <link rel="stylesheet" href="{{ asset('css/signupStyle.css')}}">
    </head>
    <main style="background-image: url('{{ asset('images/register/signup.jpg') }}')">
        <div class="h1_container">
            <div class="blue_rectangle"></div>
            <h1>Inscription</h1>
        </div>

        @if($errors->any())
        @foreach ($errors->all() as $error)
            <div class="errors">{{ $error }}</div>
        @endforeach
        @endif

        {!! Form::open(['class' => 'signup-form', 'action' => 'App\Http\Controllers\CustomerController@store', 'method' => 'POST']) !!}
            <div class="inscription-items">

                <div class="label">
                    <div class="input-fields">
                        <div>
                            {!! Form::label('last_name', 'Nom') !!}
                            <span>*</span>
                        </div>
                        {!! Form::text('last_name') !!}
                    </div>
                    <div class="input-fields">
                        <div>
                            {!! Form::label('first_name', 'Prénom') !!}
                            <span>*</span>
                        </div>
                        {!! Form::text('first_name') !!}
                    </div>
                    <div class="input-fields">
                        <div>
                            {!! Form::label('email', 'Email') !!}
                            <span>*</span>
                        </div>
                        {!! Form::email('email') !!}
                    </div>
                    <div class="input-fields">
                        <div>
                            {!! Form::label('password', 'Mot de passe') !!}
                            <span>*</span>
                        </div>
                        {!! Form::password('password') !!}
                    </div>
                    <div class="input-fields">
                        <div>
                            {!! Form::label('password_confirm', 'Confirmation de mot de passe') !!}
                            <span>*</span>
                        </div>
                        {!! Form::password('password_confirmation') !!}
                    </div>
                </div>
            </div>
            <div class="cgu">
                <p>* Champs obligatoires</p>
                <div>
                    {!! Form::checkbox('cgu') !!}
                    <span>J’accepte les termes et conditions de la Politique de Confidentialité de  Serv’Drone</span>
                </div>
                <div>
                    {!! Form::checkbox('newsletter') !!}
                    <span>Je souhaite m’inscrire à la Newsletter pour recevoir des offres Serv’Drone par courriel</span>
                </div>
            </div>
            <div class="send-button">
                {!! Form::submit('S\'inscrire', ['type' => 'button', 'class' => 'send-button']) !!}
            </div>
        {!! Form::close() !!}
    </main>
@endsection
