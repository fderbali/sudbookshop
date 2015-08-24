<?php

namespace App\Repositories;
use App\Models\ShippingAddress;
use Auth;
/**
 * Data manager for newsletters
 *
 * @author Fahmi
 */
class ShippingAddressRepository implements ShippingAddressRepositoryInterface{
    protected $shipping_address;
    public function __construct(ShippingAddress $shipping_address) {
        $this->shipping_address = $shipping_address;
    }
    
    public function save($input) {
        $shipping_address = new $this->shipping_address;
        $shipping_address->shipping_address1  = $input['shipping_address_ligne1'];
        $shipping_address->shipping_address2  = $input['shipping_address_ligne2'];
        $shipping_address->city = $input['city'];
        $shipping_address->country = $input['country'];
        $shipping_address->zip_code = $input['zip_code'];
        $shipping_address->user_id = Auth::user()->id;
        $shipping_address->save();
        return true;
    }
}
