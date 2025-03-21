@extends('layout')

@section('title', 'Paiement Annulé')

@section('content')
    <div class="container">
        <h1>Paiement Annulé</h1>
        <p>Votre commande a été annulée. Si vous avez des questions, contactez-nous.</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Retour à l'accueil</a>
    </div>
@endsection
