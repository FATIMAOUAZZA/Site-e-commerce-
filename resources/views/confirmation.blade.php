@extends('layout')

@section('content')
<div class="container">
    <h2>Confirmation de votre commande</h2>
    <p>Merci pour votre commande, {{ $order->name }} !</p>
    <p>Numéro de commande: <strong>#{{ $order->id }}</strong></p>
    <p>Montant total: <strong>{{ $order->total_amount+5 }} €</strong></p>

    <a href="{{ route('orders.index') }}" class="btn btn-primary">Voir mes commandes</a>
</div>
@endsection
