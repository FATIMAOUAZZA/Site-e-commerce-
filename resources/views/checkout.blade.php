@extends('layout')

@section('content')
<div class="container">
    <h2>Passer la commande</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartItems as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->product->price }} €</td>  <!-- Récupérer le prix unitaire -->
                    <!-- Calcul du total -->
                    <td>{{ $item->quantity * $item->product->price }} €</td>  <!-- Total = quantité * prix unitaire -->
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Total: {{ $totalAmount }} € (incluant {{ $deliveryCharges }} € de livraison)</h4>

    <form action="{{ route('orders.store') }}" method="POST">
    @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Téléphone</label>
            <input type="text" class="form-control" name="phone" required>
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">Ville</label>
            <input type="text" class="form-control" name="city" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Adresse</label>
            <input type="text" class="form-control" name="address" required>
        </div>
        <div class="mb-3">
            <label for="zipcode" class="form-label">Code Postal</label>
            <input type="text" class="form-control" name="zipcode" required>
        </div>
        <button type="submit" class="btn btn-primary">Passer la commande</button>
    </form>
</div>
@endsection
