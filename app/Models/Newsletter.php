<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Newsletter extends Model {

	protected $table = 'newsletter';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];

}