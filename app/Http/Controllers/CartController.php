<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

use Illuminate\Http\Request;

class CartController extends Controller {
    public function addToCart($isbn, $quantity) {
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
            }
            Session::put('cart',$cart);
            if(!$added){
                $cart[$isbn] = $quantity;
                Session::put('cart',$cart);
            }            
        }
        else {
            $cart[$isbn] = $quantity;
            Session::put('cart',$cart);
        }
        print_r(Session::get('cart'));
    }
}
