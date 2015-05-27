<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePromotionTable extends Migration {

	public function up()
	{
		Schema::create('promotion', function(Blueprint $table) {
			$table->increments('id');
			$table->datetime('start_at');
			$table->datetime('end_at');
			$table->enum('type_of_discount', array('percentage', 'absolute'));
			$table->float('value');
		});
	}

	public function down()
	{
		Schema::drop('promotion');
	}
}