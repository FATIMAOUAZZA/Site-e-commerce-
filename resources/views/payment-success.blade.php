@extends('layout')

@section('title', 'Paiement Réussi')

@section('content')
    <div class="container">
        <h1>Paiement Réussi !</h1>
        <p>Merci pour votre achat. Votre commande a été confirmée.</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Retour à l'accueil</a>
    </div>
@endsection
