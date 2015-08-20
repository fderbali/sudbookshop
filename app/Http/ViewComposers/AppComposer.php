<?php
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Session;

class AppComposer {
    
    public function compose(View $view){
        $total_books = 0;
        if(Session::has('cart')){
            $cart = Session::get('cart');
            foreach ($cart as $isbn => $quantity){
                $total_books += $quantity;
            }
        }
        $view->with('total_books', $total_books);
    }
}
