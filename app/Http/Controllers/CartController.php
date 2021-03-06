<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Processors\ShoppingCartInterface;
use Session;
use Illuminate\Http\Request;

class CartController extends Controller {
    public function addToCart(ShoppingCartInterface $shoppingCart) {
        echo $shoppingCart->addTocart();
    }
    public function showCart(ShoppingCartInterface $shoppingCart, Request $request){
        $shopping_cart_infos = $shoppingCart->getShoppingCartInfos();
        $sub_totals = $shopping_cart_infos[0];
        $books_in_cart = $shopping_cart_infos[1];
        $total = $shopping_cart_infos[2];
        $cart = Session::get('cart');
        if($request->ajax()) 
            return view('cart/items_in_cart', compact('books_in_cart','sub_totals','total','cart'));
        else
            return view('cart/shopping_cart', compact('books_in_cart','sub_totals','total','cart'));
    }
}
