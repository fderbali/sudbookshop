<?php
namespace App\Processors;
use App\Models\Book;
use Session;
use Request;
/**
 * Description of ShoppingCart
 *
 * @author Fahmi
 */
class ShoppingCart implements ShoppingCartInterface {
    
    private $isbns;
    private $quantities;
    
    public function __construct() {
        $list_isbn=array();
        $list_quantities=array();
        if(Session::has('cart')){
            $cart = Session::get('cart');
            $list_quantities=$cart;
            foreach ($cart as $isbn => $quantity){
                $list_isbn[]=$isbn;
            }
        }
        $this->isbns = $list_isbn;
        $this->quantities = $list_quantities;
    }
    
    public function addToCart(){
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
        echo $total_books;
    }

    public function getShoppingCartInfos() {
        $sub_totals=array();
        $total = 0;
        $books_in_cart = Book::whereIn('isbn', $this->isbns)->get();
        foreach ($books_in_cart as $book){
            $sub_totals[$book->isbn]=$book->price * $this->quantities[$book->isbn];
            $total += $sub_totals[$book->isbn];
        }
        return[$sub_totals, $books_in_cart, $total];
    }
    
}
