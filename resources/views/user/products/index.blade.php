@extends('layouts.app')

@section('title', 'index')

@section('content')
<style>
    .placeholder-img{
        max-width: 250px;
        max-height: 250px;
        align-self: center;
    }
    .price-card{
        font-size: 1.2rem;
        font-weight: bold;
    }
    .description{
        font-size: 0.8rem;
        color: #333;
    }
    p.card-text{
        min-height: 90px;
    }
</style>
<br>
<div class="row">
    @foreach($products as $product)
    <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="card">
            <img class="card-img-top placeholder-img" src="{{$product->image}}" alt="Card image">
            <div class="card-body">
            <h4 class="card-title price-card">{{$product->title}}</h4>
            <p class="card-text description">{{$product->description}}</p>
            <div class="float-left price-card"> ฿ {{ number_format($product->price) }}</div>
            <div class="float-right"> 
                <a href="{{url('cart/add/index/'.$product->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-cart-plus"></i>&nbsp;Add to Cart</a>
            </div>
        </div>
        </div>
    </div>
    @endforeach
    
</div>
@endsection

