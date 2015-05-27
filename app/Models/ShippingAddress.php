<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model {

	protected $table = 'shipping_address';
	public $timestamps = false;

	public function order()
	{
		return $this->belongsToMany('App\Order', 'shipping_adress_order');
	}

}