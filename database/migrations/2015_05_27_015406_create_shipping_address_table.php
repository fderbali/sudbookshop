<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShippingAddressTable extends Migration {

	public function up()
	{
		Schema::create('shipping_address', function(Blueprint $table) {
			$table->increments('id');
			$table->string('shipping_address1', 100);
			$table->string('shipping_address2', 100);
			$table->string('zip_code', 10);
			$table->string('city', 50);
			$table->string('country', 50);
			$table->integer('user_id');
		});
	}

	public function down()
	{
		Schema::drop('shipping_address');
	}
}