@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<style>
    body {
      font-family: Arial;
      font-size: 17px;
      padding: 8px;
    }
    
    * {
      box-sizing: border-box;
    }
    
    .row {
      display: -ms-flexbox; /* IE10 */
      display: flex;
      -ms-flex-wrap: wrap; /* IE10 */
      flex-wrap: wrap;
      margin: 0 -16px;
    }
    
    .col-25 {
      -ms-flex: 25%; /* IE10 */
      flex: 25%;
    }
    
    .col-50 {
      -ms-flex: 50%; /* IE10 */
      flex: 50%;
    }
    
    .col-75 {
      -ms-flex: 75%; /* IE10 */
      flex: 75%;
    }
    
    .col-25,
    .col-50,
    .col-75 {
      padding: 0 16px;
    }
    
    .container {
      background-color: #f2f2f2;
      padding: 5px 20px 15px 20px;
      border: 1px solid lightgrey;
      border-radius: 3px;
    }
    
    input[type=text] {
      width: 100%;
      margin-bottom: 20px;
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }
    
    label {
      margin-bottom: 10px;
      display: block;
    }
    
    .icon-container {
      margin-bottom: 13px;
      padding: 7px 0 0 0;
      font-size: 24px;
    }
    
    .btn2 {
      background-color: #4CAF50;
      color: white;
      padding: 12px;
      margin: 10px 0;
      border: none;
      width: 100%;
      border-radius: 3px;
      cursor: pointer;
      font-size: 17px;
    }
    
    .btn:hover {
      background-color: #45a049;
    }
    
    a {
      color: #2196F3;
    }
    
    hr {
      border: 1px solid lightgrey;
    }
    
    span.price {
      float: right;
      color: grey;
    }
    
    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
      .row {
        flex-direction: column-reverse;
      }
      .col-25 {
        margin-bottom: 20px;
      }
    }
    </style>
<br>
<div class="row">
    <div class="col-75">
      <div class="container">
        <form action="/action_page.php">
        
          <div class="row">
            <div class="col-50">
              <h3>Billing Address</h3>
              <label for="fname"><i class="fa fa-user"></i> Full Name</label>
              <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
              <label for="email"><i class="fa fa-envelope"></i> Email</label>
              <input type="text" id="email" name="email" placeholder="john@example.com">
              <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
              <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
              <label for="city"><i class="fa fa-institution"></i> City</label>
              <input type="text" id="city" name="city" placeholder="New York">
  
              <div class="row">
                <div class="col-50">
                  <label for="state">State</label>
                  <input type="text" id="state" name="state" placeholder="NY">
                </div>
                <div class="col-50">
                  <label for="zip">Zip</label>
                  <input type="text" id="zip" name="zip" placeholder="10001">
                </div>
              </div>
            </div>
  
            <div class="col-50">
              <h3>Payment</h3>
              <label for="fname">Accepted Cards</label>
              <div class="icon-container">
                <i class="fab fa-cc-visa" style="color:navy;"></i>
                <i class="fab fa-cc-jcb" style="color:blue;"></i>
                <i class="fab fa-cc-mastercard" style="color:red;"></i>
                <i class="fab fa-cc-paypal" style="color:orange;"></i>
              </div>
              <label for="cname">Name on Card</label>
              <input type="text" id="cname" name="cardname" placeholder="John More Doe">
              <label for="ccnum">Credit card number</label>
              <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
              <label for="expmonth">Exp Month</label>
              <input type="text" id="expmonth" name="expmonth" placeholder="September">
              <div class="row">
                <div class="col-50">
                  <label for="expyear">Exp Year</label>
                  <input type="text" id="expyear" name="expyear" placeholder="2018">
                </div>
                <div class="col-50">
                  <label for="cvv">CVV</label>
                  <input type="text" id="cvv" name="cvv" placeholder="352">
                </div>
              </div>
            </div>
            
          </div>
          <label>
            <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
          </label>
          <input type="submit" value="Continue to checkout" class="btn2">
        </form>
      </div>
    </div>
    <div class="col-25">
      <div class="container">
        <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>{{$totalQty}}</b></span></h4>
        @if(count($items)>0)
            @foreach ($items as $item)
      <p><a href="#" style="font-size: 14px">{{$item['item']['title'] ." X". $item['qty']}}</a> <span class="price">{{number_format($item['price'])}}</span></p>
            @endforeach
        @endif
        <hr>
        <p>Total <span class="price" style="color:black"><b> ฿ {{number_format($totalPrice,2)}}</b></span></p>
      </div>
    </div>
  </div>
@endsection

