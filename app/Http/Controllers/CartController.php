<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Session;
use Request;

class CartController extends Controller {
    public function addToCart() {
        $isbn = Request::input('isbn');
        $quantity = Request::input('quantity');
        $total_books = 0;
        if(Session::has('cart')){
            $cart = Session::get('cart');
            $added = false;
            foreach ($cart as $i=>$qty)
            {
                if($i == $isbn){
                    $qty += $quantity;
                    $cart[$isbn] = $qty;
                    $added = true;
                }
                $total_books+=$cart[$i];
            }
            Session::put('cart',$cart);
            if(!$added){
                $cart[$isbn] = $quantity;
                $total_books+=$quantity;
                Session::put('cart',$cart);
            }            
        }
        else {
            $cart[$isbn] = $quantity;
            $total_books+=$quantity;
            Session::put('cart',$cart);
        }
        echo($total_books);
    }
}
