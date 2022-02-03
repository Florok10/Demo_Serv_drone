@extends('layouts.app')
@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/order.css') }}">
</head>
@livewire('create-order')
@endsection
