<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $table = 'category';
	public $timestamps = false;

	public function books()
	{
		return $this->hasMany('App\Book', 'category_id');
	}

	public function section()
	{
		return $this->belongsTo('App\Models\Section', 'section_id');
	}

}