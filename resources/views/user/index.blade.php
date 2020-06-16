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
</style>
<br>
<div class="row">
    @for ($i = 0; $i <10; $i++)
    <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="card">
            <img class="card-img-top placeholder-img" src="https://smartsolutioncomputer.com/upload-img/Products/New-Products/28b76728c9abcb2a39dceb037100b811.jpg" alt="Card image">
            <div class="card-body">
            <h4 class="card-title price-card">NoteBook Lenovo</h4>
            <p class="card-text description">LENOVO โน๊ตบุ๊ค (15.6", Intel Core i7, Ram 16GB, 512GB) รุ่น LEGION Y540-15IRH I7-9750HF + กระเป๋า</p>
            <div class="float-left price-card"> $250</div>
            <div class="float-right"> 
                <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-cart-plus"></i>&nbsp;Add to Cart</a>
            </div>
        </div>
        </div>
    </div>
    @endfor
    
</div>
@endsection

