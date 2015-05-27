<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {

	protected $table = 'book';
	public $timestamps = false;

	public function category()
	{
		return $this->belongsTo('App\Category', 'category_id');
	}

	public function promotions()
	{
		return $this->belongsToMany('App\Promotion', 'promo_book');
	}

}