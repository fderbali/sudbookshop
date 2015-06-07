<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShippingAddressOrderTable extends Migration {

	public function up()
	{
		Schema::create('shipping_address_order', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('order_id');
			$table->integer('shipping_address_id');
		});
	}

	public function down()
	{
		Schema::drop('shipping_address_order');
	}
}