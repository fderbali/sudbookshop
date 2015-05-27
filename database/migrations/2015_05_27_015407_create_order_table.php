<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderTable extends Migration {

	public function up()
	{
		Schema::create('order', function(Blueprint $table) {
			$table->increments('id');
			$table->datetime('created_at');
			$table->datetime('updated_at');
			$table->enum('state', array('pending', 'validated', 'cancelled', 'shipped'));
			$table->float('total');
			$table->integer('user_id');
		});
	}

	public function down()
	{
		Schema::drop('order');
	}
}