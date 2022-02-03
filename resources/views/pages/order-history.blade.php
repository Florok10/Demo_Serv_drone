@extends('layouts.app')

@section('content')

    <section>
        <div class="h1_container">
            <div class="blue_rectangle"></div>
            <h1>Historique de commande</h1>
        </div>
        <table>
            <tbody>
                <tr>
                    <th>Numéro de commande</th>
                    <th>Pays</th>
                    <th>Adresse</th>
                    <th>Code Postal</th>
                    <th>Numéro d'apartement</th>
                    <th>Bâtiment</th>
                    <th>Statut</th>
                    <th>Produits</th>
                    <th>Total TTC</th>
                    <th>Effectué le</th>
                </tr>
                @foreach(Auth::user()->orderHistory()->orders() as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->country }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->postal_code }}</td>
                        @if ($order->apartment_number != NULL && $order->building != NULL)
                            <td>{{ $order->apartment_number }}</td>
                            <td>{{ $order->building }}</td>
                        @endif
                        <td></td>
                        <td></td>
                        <td>{{ $order->status }}</td>
                        <tr>
                            @foreach ($order->products() as $product)
                            <td>{{$product->name}}</td>
                            @endforeach
                        </tr>
                        <td>{{ $order->total_price }}</td>
                        <td>{{ $order->done_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </section>

@endsection
