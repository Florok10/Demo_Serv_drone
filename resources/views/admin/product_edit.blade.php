@extends('layouts.app')

@section('content')

<head>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/productEdit.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<main>
    <div class="h1_container">
        <div class="blue_rectangle"></div>
        <h1>Editer {{ stripslashes($product->name) }}</h1>
    </div>

    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div class="errors">{{ $error }}</div>
        @endforeach
    @endif
    <!-- start form -->

    {!! Form::open(['id' => 'report', 'action' => 'App\Http\Controllers\ProductController@update', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'col-md-6 m-auto my-5']) !!}

    @csrf

    {!! Form::hidden('id', $product->id) !!}

    <div class="form-group my-4">
        {!! Form::label('name', 'Nom') !!}
        {!! Form::text('name', stripslashes($product->name), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group my-4">
        {!! Form::label('title', 'Titre') !!}
        {!! Form::text('title', stripslashes($product->title), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group my-4">
        {!! Form::label('image', 'Image') !!}
        {!! Form::file('image', ['accept' => 'image/png, image/jpeg, image/jpg', 'class' => 'form-control']) !!}
    </div>

    <!-- start function super container -->

    <h2 id="function_h2">Les Fonctionnalités</h2>
    {!! Form::label('function_h2', '1 à 3 fonctionnalités, elles seront afficher sous forme de petites cartes dans la fiche du produit, 30 caractères maximum par titre et 120 par fonction') !!}
    <div id="functions_super_container" class="containers">

        <div class="functions_containers">
            <h3>La première fonctionnalité</h3>

            <div class="form-group my-4">
                {!! Form::label('first_title', 'Titre de la fonctionnalité (court)') !!}
                {!! Form::text('first_title', stripslashes($product->productFunction->first_title), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group my-4">
                {!! Form::label('first_function', 'La fonctionnalité') !!}
                {!! Form::text('first_function', stripslashes($product->productFunction->first_function), ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="functions_containers hide_and_display">
            <h3>La seconde fonctionnalité</h3>

            <div class="form-group my-4">
                {!! Form::label('second_title', 'Titre de la fonctionnalité (court)') !!}
                {!! Form::text('second_title', stripslashes($product->productFunction->second_title), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group my-4">
                {!! Form::label('second_function', 'La fonctionnalité') !!}
                {!! Form::text('second_function', stripslashes($product->productFunction->second_function), ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="functions_containers hide_and_display">
            <h3>La troisième fonctionnalité</h3>

            <div class="form-group my-4">
                {!! Form::label('third_title', 'Titre de la fonctionnalité (court)') !!}
                {!! Form::text('third_title', stripslashes($product->productFunction->third_title), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group my-4">
                {!! Form::label('third_function', 'La fonctionnalité') !!}
                {!! Form::text('third_function', stripslashes($product->productFunction->third_function), ['class' => 'form-control']) !!}
            </div>
        </div>

    </div>

    <!-- end function super container -->

    <div class="form-group my-4">
        {!! Form::label('characteristics', 'Un texte concernant les caractéristiques du produit, 300 caractères maximum') !!}
        {!! Form::textarea('characteristics', stripslashes($product->productFunction->characteristics), ['class' => 'form-control']) !!}
    </div>

    <div>
        <h2 id="description_h2">Descriptions diverses concernant le produit</h2>

        {!! Form::label('description_h2', '1 à 4 descriptions, ces descriptions seront afficher sous forme de paragraphe dans la fiche du produit, maximum 300 caractères par description.') !!}

        <div class="form-group my-4">
            {!! Form::label('first_description', 'La description') !!}
            {!! Form::textarea('first_description', stripslashes($product->productDescription->first_description), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group my-4">
            {!! Form::label('second_description', 'La description') !!}
            {!! Form::textarea('second_description', stripslashes($product->productDescription->second_description), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group my-4">
            {!! Form::label('third_description', 'La description') !!}
            {!! Form::textarea('third_description', stripslashes($product->productDescription->third_description), ['class' => 'form-control']) !!}
        </div>

        <div class="form-group my-4">
            {!! Form::label('fourth_description', 'La description') !!}
            {!! Form::textarea('fourth_description', stripslashes($product->productDescription->fourth_description), ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group my-4">
        {!! Form::label('available_product_amount', 'Nombre de produit disponible à la vente') !!}
        {!! Form::number('available_product_amount', $product->stock->available_product_amount, ['min' => '1', 'class' => 'form-control']) !!}
    </div>

    <div class="form-group my-4">
        {!! Form::label('price_per_unit', 'Prix de vente par unité (hors taxes') !!}
        {!! Form::number('price_per_unit', $product->price, ['min' => '1']) !!}
    </div>

    {!! Form::submit('Modifier', ['type' => 'button', 'id' => 'form_btn_submit', 'class' => 'btn-primary btn-lg btn']) !!}

    {!! Form::close() !!}

</main>

@endsection
