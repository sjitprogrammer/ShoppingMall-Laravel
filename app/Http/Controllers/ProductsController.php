<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Session;
class ProductsController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('user.products.index',['products'=>$products]);
    }

    public function getAddToCart(Request $request,$type,$id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);

        $request->session()->put('cart',$cart);
        if($type=='cart') return redirect('products/cart');
        // dd($request->session()->get('cart'));
        return redirect('products/index');
    }

    public function getProductsCart()
    {
        if(!Session::has('cart')){
            return view('user.products.cart',['products'=>null,'totalQty'=>0,'totalPrice'=>0]);
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $data = $cart->getDataInCart();
        // dd($data);
        return view('user.products.cart'
        ,['products'=>$data['items']
        ,'totalQty'=>$data['totalQty']
        ,'totalPrice'=>$data['totalPrice']
        ]);
    }

    public function subtractCart(Request $request,$id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        // dd($cart);
        $cart->subtract($product,$id);

        $request->session()->put('cart',$cart);
        // dd($request->session()->get('cart'));
        return redirect('products/cart');
    }

    public function removeItemCart(Request $request,$id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        // dd($cart);
        $cart->removeItem($product,$id);

        $request->session()->put('cart',$cart);
        // dd($request->session()->get('cart'));
        return redirect('products/cart');
    }

    public function removeAllCart(Request $request)
    {
        $request->session()->forget('cart');
        return redirect('products/cart');
    }

    public function getCheckOut()
    {
        if(!Session::has('cart')) return redirect('products/cart');

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $data = $cart->getDataInCart();
        return view('user.products.checkout',['totalPrice'=>$data['totalPrice'],'items'=>$data['items'],'totalQty'=>$data['totalQty']]);
    }

    public function destroy($id)
    {
        //
    }
}
