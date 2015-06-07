<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderDetailTable extends Migration {

	public function up()
	{
		Schema::create('order_detail', function(Blueprint $table) {
			$table->increments('id');
			$table->float('price');
			$table->float('shipping_fees')->nullable();
			$table->integer('quantity');
			$table->integer('order_id');
			$table->integer('book_id');
		});
	}

	public function down()
	{
		Schema::drop('order_detail');
	}
}