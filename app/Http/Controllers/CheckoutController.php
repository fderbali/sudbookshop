<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class CheckoutController extends Controller {
    
    public function __construct()
    {
            $this->middleware('auth');
    }
    public function checkout() {
        
        return view('checkout/checkout');
    }
}
