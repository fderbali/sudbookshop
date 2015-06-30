<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {

	protected $table = 'book';
	public $timestamps = false;

	public function category()
	{
		return $this->belongsTo('App\Models\Category', 'category_id');
	}

	public function promotions()
	{
		return $this->belongsToMany('App\Models\Promotion', 'promo_book');
	}

}