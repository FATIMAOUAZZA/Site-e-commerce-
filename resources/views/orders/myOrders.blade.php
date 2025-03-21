@extends('layout')

@section('content')
<div class="container">
    <h2>Mes commandes</h2>

    @if($orders->isEmpty())
        <p>Vous n'avez pas encore passé de commande.</p>
    @else
        @foreach($orders as $order)
        <div class="order-box" style="
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 15px;
            background-color: 
                @if($order->status == 'completed') #d4edda;
                @elseif($order->status == 'pending') #fff3cd;
                @elseif($order->status == 'cancelled') #f8d7da;
                @else #f9f9f9;
                @endif
            border-radius: 8px;
        ">
            <h3>Commande #{{ $order->id }}</h3>
            <p><strong>Date de la commande :</strong> {{ $order->created_at->format('d/m/Y') }}</p>
            <p><strong>Statut de la commande :</strong> 
                @if($order->status == 'completed')
                    <span style="color: green;">Complétée</span>
                @elseif($order->status == 'pending')
                    <span style="color: orange;">En attente</span>
                @elseif($order->status == 'cancelled')
                    <span style="color: red;">Annulée</span>
                @else
                    <span>Inconnu</span>
                @endif
            </p>
            <p><strong>Statut de paiement :</strong> 
                @if($order->payment_status)
                    <span style="color: green;">{{ $order->payment_status }}</span>
                @else
                    <span style="color: gray;">Non payé</span>
                @endif
            </p>
        </div>
        @endforeach
    @endif
</div>
@endsection
