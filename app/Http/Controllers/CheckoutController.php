<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Processors\CheckoutInterface;
use App\Http\Requests\ShippingAddressRequest;
use App\Repositories\ShippingAddressRepositoryInterface;
use Illuminate\Http\Request;

class CheckoutController extends Controller {
    
    public function __construct()
    {
            $this->middleware('auth');
    }
    public function checkout(CheckoutInterface $checkout, Request $request) {
        $shipping_adresses = $checkout->getShippingAddresses();
        if($request->ajax()) 
            return view('checkout/shipping_adresses',compact("shipping_adresses"));
        else
            return view('checkout/checkout',compact("shipping_adresses"));
    }
    public function saveNewShippingAddress(ShippingAddressRequest $request,
                ShippingAddressRepositoryInterface $shippingAddressRepository
            ){
        if($shippingAddressRepository->save($request->all()))
        {
            echo'Ok';
        }
    }
}
