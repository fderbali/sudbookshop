<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model {

	protected $table = 'section';
	public $timestamps = false;

	public function categories()
	{
            return $this->hasMany('App\Models\Category', 'section_id');
	}

}