@extends('layouts.app')

@section('content')
<x-guest-layout>


    <head>
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    </head>


        {{-- <x-jet-validation-errors class="mb-4" /> --}}

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <section>
            <div class="inscription-img"></div>
            <div class="inscription-form">
                <div class="connection">
                    <h2>Identifiez-vous</h2>
                    @error('message') <span class="text-danger">{{ $message }}</span> @enderror
                    @error('throttle') <span class="text-danger">{{ $message }}</span> @enderror
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="password" value="{{ __('Mot de passe') }}" />
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        </div>

                        <div class="block mt-4">
                            <label for="remember_me" class="flex items-center">
                                <x-jet-checkbox id="remember_me" name="remember" />
                                <span class="ml-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Mot de passe oublié ?') }}
                                </a>
                            @endif

                            <x-jet-button class="ml-4">
                                {{ __('Connexion') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
                <div class="inscription">
                    <h2>Nouveau client</h2>
                    <div class="send-button">
                        <a type="button" href="{{ route('register') }}">S'inscrire</a>
                    </div>
                </div>
            </div>
        </section>
</x-guest-layout>
@endsection
