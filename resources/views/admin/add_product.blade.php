@extends('layouts.app')

@section('content')

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/productAdd.css') }}">
</head>

<div class="h1_container">
    <div class="blue_rectangle"></div>
    <h1>Ajouter un produit</h1>
</div>

    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div class="errors">{{ $error  }}</div>
        @endforeach
    @endif
    <!-- start form -->

    {!! Form::open(['id' => 'report', 'action' => 'App\Http\Controllers\ProductController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'col-md-6 m-auto']) !!}
    @csrf
    <div class="form-group my-4">
        {!! Form::label('name', 'Nom') !!}
        {!! Form::text('name') !!}
    </div>

    <div class="form-group my-4">
        {!! Form::label('title', 'Titre') !!}
        {!! Form::text('title') !!}
    </div>

    <div class="form-group my-4">
        {!! Form::label('image', 'Image') !!}
        {!! Form::file('image', ['accept' => 'image/png, image/jpeg, image/jpg']) !!}
    </div>

    <!-- start function super container -->

    <h2 id="function_h2">Les Fonctionnalités</h2>
    {!! Form::label('function_h2', '1 à 3 fonctionnalités, elles seront afficher sous forme de petites cartes dans la fiche du produit, 30 caractères maximum par titre et 120 par fonction') !!}
    <span role="button" type="button" id="hide_display_functions" class="btn btn-info">Afficher / Cacher</span>
    <div id="functions_super_container" class="containers">

        <div class="functions_containers my-4">
            <h3>La première fonctionnalité</h3>

            <div class="form-group my-4">
                {!! Form::label('first_title', 'Titre de la fonctionnalité (court)') !!}
                {!! Form::text('first_title') !!}
            </div>

            <div class="form-group my-4">
                {!! Form::label('first_function', 'La fonctionnalité') !!}
                {!! Form::text('first_function') !!}
            </div>
        </div>

        <div class="functions_containers hide_and_display">
            <h3>La seconde fonctionnalité</h3>

            <div class="form-group my-4">
                {!! Form::label('second_title', 'Titre de la fonctionnalité (court)') !!}
                {!! Form::text('second_title') !!}
            </div>

            <div class="form-group my-4">
                {!! Form::label('second_function', 'La fonctionnalité') !!}
                {!! Form::text('second_function') !!}
            </div>
        </div>

        <div class="functions_containers hide_and_display">
            <h3>La troisième fonctionnalité</h3>

            <div class="form-group my-4">
                {!! Form::label('third_title', 'Titre de la fonctionnalité (court)') !!}
                {!! Form::text('third_title') !!}
            </div>

            <div class="form-group my-4">
                {!! Form::label('third_function', 'La fonctionnalité') !!}
                {!! Form::text('third_function') !!}
            </div>
        </div>

    </div>

    <!-- end function super container -->

    <div class="form-group my-4">
        <h2>Caractéristiques</h2>
        {!! Form::label('characteristics', 'Un texte concernant les caractéristiques du produit, 300 caractères maximum') !!}
        {!! Form::textarea('characteristics') !!}
    </div>

    <div>
        <h2 id="description_h2">Descriptions diverses concernant le produit</h2>

        {!! Form::label('description_h2', '1 à 4 descriptions, ces descriptions seront afficher sous forme de paragraphe dans la fiche du produit, maximum 300 caractères par description.') !!}

        <span role="button" type="button" id="hide_display_descriptions" class="btn btn-info">Afficher / Cacher</span>

        <div class="form-group my-4">
            <h3>La première description</h3>
            {!! Form::label('first_description', 'La description') !!}
            {!! Form::textarea('first_description') !!}
        </div>

        <div class="form-group my-4 hide_and_display descriptions_containers">
            <h3>La seconde description</h3>
            {!! Form::label('second_description', 'La description') !!}
            {!! Form::textarea('second_description') !!}
        </div>

        <div class="form-group my-4 hide_and_display descriptions_containers">
            <h3>La troisième description</h3>
            {!! Form::label('third_description', 'La description') !!}
            {!! Form::textarea('third_description') !!}
        </div>

        <div class="form-group my-4 hide_and_display descriptions_containers">
            <h3>La quatrième description</h3>
            {!! Form::label('fourth_description', 'La description') !!}
            {!! Form::textarea('fourth_description') !!}
        </div>
    </div>

    <div class="form-group my-4">
        {!! Form::label('available_product_amount', 'Nombre de produit disponible à la vente') !!}
        {!! Form::number('available_product_amount', 1, ['min' => '1']) !!}
    </div>

    <div class="form-group my-4">
        {!! Form::label('price', 'Prix de vente par unité en centimes (hors taxes)') !!}
        {!! Form::number('price', 1, ['min' => '1']) !!}
    </div>

    {!! Form::submit('Ajouter', ['type' => 'button', 'id' => 'form_btn_submit', 'class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection

@section('script')

<script>
    const btnFunction = document.getElementById("hide_display_functions");

    const functionsHidden = document.getElementsByClassName("functions_containers");

    const inputs = document.querySelectorAll('input');

    const texts = document.querySelectorAll('textarea');

    texts.forEach(element => {
        element.classList.add('form-control')
    });

    inputs.forEach(element => {
        element.classList.add('form-control')
    });

    btnFunction.addEventListener("click", () =>
    {
        for(let i = 1; i < functionsHidden.length; i++)
        {
            functionsHidden[i].classList.toggle("hide_and_display");
        };
    });

    const btnDescription = document.getElementById("hide_display_descriptions");

    const descriptionsHidden = document.getElementsByClassName("descriptions_containers");

    btnDescription.addEventListener("click", () =>
    {
        for(let i = 1; i < functionsHidden.length; i++)
        {
            descriptionsHidden[i].classList.toggle("hide_and_display");
        };
    });
</script>


@endsection

