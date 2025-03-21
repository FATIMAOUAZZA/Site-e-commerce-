@extends('layout')

@section('content')
<div class="container">
<h2>Commande #{{ $order->id }}</h2>
<h4>Total: €{{ number_format($totalAmount, 2) }} (incluant €{{ number_format($deliveryCharges, 2) }} de livraison)</h4>

    <form action="{{ route('payment', $order->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Confirmer le Paiement</button>
    </form>
    <form action="{{ route('cancel', $order->id) }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" class="btn btn-danger">Annuler la Commande</button>
</form>
</div>
@endsection
