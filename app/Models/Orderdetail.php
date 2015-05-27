<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model {

	protected $table = 'order_detail';
	public $timestamps = false;

	public function order()
	{
		return $this->belongsTo('App\Order', 'order_id');
	}

}