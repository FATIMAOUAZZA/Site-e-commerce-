@extends('layout')

@section('title', 'Your Cart')

@section('content')
<section class="cart" id="cart">
    <h1 class="heading">Your Cart</h1>

    @if($cartItems->isEmpty())
        <p class="empty-cart">Your cart is empty!</p>
    @else
        <div class="cart-items">
            @foreach ($cartItems as $cartItem)
                <div class="cart-item">
                    <img src="{{ asset('storage/' . $cartItem->product->image) }}" alt="{{ $cartItem->product->name }}" class="cart-item-image">
                    <div class="cart-item-details">
                        <h3 class="cart-item-name">{{ $cartItem->product->name }}</h3>
                        <p class="cart-item-quantity">Quantity: <span>{{ $cartItem->quantity }}</span></p>
                        <p class="cart-item-price">Price: ${{ $cartItem->total_price }}</p>

                        <form action="{{ route('cart.remove', $cartItem->product->id) }}" method="POST" class="remove-form">
                            @csrf
                            <button type="submit" class="remove-btn">Remove</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="cart-footer">
            <a href="{{ route('checkout') }}" class="checkout-btn">Proceed to Checkout</a>
        </div>
    @endif
</section>

@endsection

@section('styles')
<style>
    .cart {
        max-width: 1200px;
        margin: 0 auto;
        padding: 50px 20px;
        background-color: #f8f8f8;
        border-radius: 8px;
    }

    .heading {
        font-size: 36px;
        text-align: center;
        color: #333;
        margin-bottom: 30px;
    }

    .empty-cart {
        font-size: 20px;
        color: #555;
        text-align: center;
    }

    .cart-items {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
    }

    .cart-item {
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
    }

    .cart-item:hover {
        transform: translateY(-5px);
    }

    .cart-item-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-bottom: 1px solid #ddd;
    }

    .cart-item-details {
        padding: 15px;
        text-align: center;
    }

    .cart-item-name {
        font-size: 20px;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .cart-item-quantity, .cart-item-price {
        font-size: 16px;
        color: #777;
        margin-bottom: 5px;
    }

    .cart-item-quantity span, .cart-item-price span {
        font-weight: bold;
        color: #333;
    }

    .remove-btn {
        background-color: #e74c3c;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .remove-btn:hover {
        background-color: #c0392b;
    }

    .cart-footer {
        text-align: center;
        margin-top: 30px;
    }

    .checkout-btn {
        background-color: #3498db;
        color: white;
        padding: 15px 30px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 18px;
        transition: background-color 0.3s ease;
    }

    .checkout-btn:hover {
        background-color: #2980b9;
    }
</style>
@endsection
