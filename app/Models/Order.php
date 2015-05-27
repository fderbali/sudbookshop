<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

	protected $table = 'order';
	public $timestamps = false;

	public function user()
	{
		return $this->belongsTo('App\User', 'user_id');
	}

	public function details()
	{
		return $this->belongsToMany('App\Book', 'order_detail')->withPivot('price','shipping_fees','quantity');
	}

	public function shipping_address()
	{
		return $this->belongsToMany('App\ShippingAddress', 'shipping_adress_order');
	}

}