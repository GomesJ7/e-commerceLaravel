@extends('layouts.app')

@section('content')
    <head>
        <link rel="stylesheet" href="{{ asset('css/style2.css') }}" media="screen" type="text/css" />
    </head>
        <div class="cart">
            <a id="cart_logo" href="/cart">Cart</a>
            <!--<a href="{{ route('cart.list') }}" class="flex items-center">
                <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                {{ Cart::getTotalQuantity()}}
            </a>-->
        </div>
        <div class="section grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <!-- Création d'un div class product pour chaque drone avec image, titre et lien-->
            @foreach ($products as $product)
            <div class="product">
                <div class="img">
                    <img class="catalogue" src="{{ url('storage/images/'.$product->path)}}" alt="{{$product->name}}">
                </div>
                <h3 class="item-name"> {{$product->name}} </h3>
                <p> {{$product->price}} €</p>
                <div class="buy">
                    <input type="hidden" value="{{$id = $product->id}}">
                    <a href="product/{{$id}}" class="link-product">
                        <button class="button">Find out more</button>
                    </a>
                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->name }}" name="name">
                        <input type="hidden" value="{{ $product->price }}" name="price">
                        <input type="hidden" value="{{ $product->image }}"  name="image">
                        <input type="hidden" value="1" name="quantity">
                        <button class="button px-4 py-2 text-white bg-blue-800 rounded" onclick="buy('{{ $product->id }}','{{ $product->name }}','{{ $product->price }}')">Add To Cart</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        <script src="{{ asset('javascript/cart.js') }}"></script>    
        @endsection
