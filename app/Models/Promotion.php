<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model {

	protected $table = 'promotion';
	public $timestamps = false;

	public function books()
	{
		return $this->belongsToMany('App\Book', 'promo_book');
	}

}