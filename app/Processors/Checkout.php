<?php
namespace App\Processors;
use Auth;
use App\Models\ShippingAddress;

/**
 * Checkout class
 *
 * @author Fahmi
 */

class Checkout implements CheckoutInterface {  
    public function getShippingAddresses(){
        return ShippingAddress::where("user_id",Auth::user()->id)->get();
    }
}
