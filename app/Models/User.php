<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

	protected $table = 'user';
	public $timestamps = false;

	public function shipping_address()
	{
		return $this->hasMany('App\ShippingAddress', 'user_id');
	}

}