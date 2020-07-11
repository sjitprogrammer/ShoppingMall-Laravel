@extends('layouts.app')

@section('title', 'Shopping Cart')

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
    .qty .count {
    color: #000;
    display: inline-block;
    vertical-align: top;
    font-size: 20px;
    font-weight: 700;
    line-height: 30px;
    padding: 0 2px
    ;min-width: 35px;
    text-align: center;
}
.qty .plus {
    cursor: pointer;
    display: inline-block;
    vertical-align: top;
    color: white;
    width: 30px;
    height: 30px;
    font: 30px/1 Arial,sans-serif;
    text-align: center;
    border-radius: 50%;
    }
.qty .minus {
    cursor: pointer;
    display: inline-block;
    vertical-align: top;
    color: white;
    width: 30px;
    height: 30px;
    font: 30px/1 Arial,sans-serif;
    text-align: center;
    border-radius: 50%;
    background-clip: padding-box;
}
div.qty {
    text-align: center;
}
.minus:hover{
    background-color: #717fe0 !important;
}
.plus:hover{
    background-color: #717fe0 !important;
}
.remove:hover{
    color: #717fe0 !important;
    cursor: pointer;
}
/*Prevent text selection*/
span{
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
}
input{  
    border: 0;
    width: 2%;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
input:disabled{
    background-color:white;
}
.td-ver{
    vertical-align: middle !important;
}
.total .price {
    color: #000;
    font-size: 1.2rem;
    font-weight: 700;
    padding: 0 10px;
}    
</style>
<br>
<div class="row">
    
        <div class="col-md-10">
            <h4>Your shopping cart contains: <span>{{$totalQty}} Products</span></h4>
        </div>
        <div class="col-md-2" style="text-align: right">
            <a href="{{url('cart/remove/all')}}" type="button" class="btn btn-dark btn-sm">Remove All <i class="fas fa-trash-alt"></i></a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align: center;">SL No.</th>	
                    <th style="text-align: center;">Product</th>
                    <th style="text-align: center;">Quality</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                @if(Session::has('cart'))
                    @if($products)
                    @php 
                    $index=1;
                    @endphp
                        @foreach ($products as $item)
                        @php
                            $item_id = $item['item']['id'];
                        @endphp
                        <tr>
                            <td width="10%" align="center" class="td-ver">{{@$index}}</td>
                            <td width="15%" align="center" class="td-ver"><a href="single.html"><img src="{{$item['item']['image']}}"  width="80" height="80"></a></td>
                            <td class="td-ver">
                                <div class="qty">
                                    <a href="{{ url('cart/subtract/'.$item_id)}}"><span class="minus bg-dark">-</span></a>
                                    <input type="number" class="count" name="qty" value="{{$item['qty']}}">
                                    <a href="{{ url('cart/add/cart/'.$item_id)}}"><span class="plus bg-dark">+</span></a>
                                </div>
                            </td>
                            <td width="40%" class="td-ver">
                                {{$item['item']['title']}}<br>
                                <span style="line-height: 10px;color:#666;font-size: 10px;"> {{$item['item']['description']}} </span>
                            </td>
                            
                            <td class="td-ver">{{ number_format($item['item']['price'],2) }}</td>
                            <td class="td-ver" align="center">
                                <div class="">
                                <a href="{{url('cart/removeItem/'.$item_id)}}"><i class="fas fa-trash-alt remove" style="color: red"></i>
                                </div>
                
                            </td>
                        </tr>
                        @php 
                        $index++;
                        @endphp
                        @endforeach
                    @endif
                @else
                    <tr>
                        <td colspan="6" align="center" class="td-ver"> Cart is empty !</td>
                    </tr>
                @endif
                <tr>
                    <td colspan="4" align="right" class="td-ver"><div class="total"><span class="price">Total :</span></div></td>
                    <td class="td-ver"><div class="total"><span class="price">{{ number_format($totalPrice,2) }}</span></div></td>
                    <td><div class="total"><span class="price">฿</span></div></td>
                </tr>
            </tbody>
        </table>
        <div class="col-md-12" style="text-align: right">
            <a href="{{url('cart/checkout')}}" class="btn btn-dark">CheckOut <i class="fas fa-angle-right"></i></span></a>
        </div>
    {{-- <div class="col-md-8">
        <h4>Add a new Details</h4>
        <form action="payment.html" method="post">
            <section>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label">Full name: </label>
                        <input class="form-control input-sm" type="text" name="name" placeholder="Full name">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label">Mobile number:</label>
                        <input class="form-control input-sm" type="text" placeholder="Mobile number">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label">Landmark: </label>
                        <input class="form-control input-sm" type="text" placeholder="Landmark">
                    </div>
                </div>
                <div class="row">
                    <label class="control-label">Town/City: </label>
                    <input class="form-control input-sm" type="text" placeholder="Town/City">
                </div>
                <div class="row">
                    <label class="control-label">Address type: </label>
                    <select class="form-control input-sm">
                        <option>Office</option>
                        <option>Home</option>
                        <option>Commercial</option>
                    </select>
                </div>
                <button class="btn btn-dark">Delivery to this Address</button>
            </section>
        </form>

    </div> --}}
    
</div>
@endsection

