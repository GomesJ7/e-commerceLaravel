@extends('layouts.app')

@section('content')
<a id="cart_logo" href="/cart">Cart</a>
<h1 class="titre">{{ $product->name}}</h1>
    <div class="bloc">
        <div class="image">
            <img src="{{ url('storage/images/'.$product->path)}}" alt="{{$product->name}}" height="350px" width="400px" img>
        </div>
        <div class="description">
            <p>
                {{ $product->description }}
            </p></br>
            <p>{{ $product->price}} €</p><br>
            <p>Current stock: {{ $product->stock}}</p>
            @if(Auth::user()->role=='admin')
            <form method="post" action="/edit">
                @csrf
                <input type="hidden" name="id" value="{{$product->id}}">
                <label>Stock: </label><input type="number" size="10" maxlength="40" name="stock" autofocus><br><br>
                <button type="submit">Confirm New Stock</button><br><br>
            
            @endif
            </form>
            <div class="purchase">
            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->name }}" name="name">
                        <input type="hidden" value="{{ $product->price }}" name="price">
                        <input type="hidden" value="{{ $product->image }}"  name="image">
                        <input type="hidden" value="1" name="quantity">
                        <button type="submit" class="btn btn-warning"  onclick="buy('{{ $product->id }}','{{ $product->name }}','{{ $product->price }}')">Add to card</button>
                    </form>
             </div>
        </div>
    </div>   
    <script src="{{ asset('javascript/cart.js') }}"></script>
@endsection