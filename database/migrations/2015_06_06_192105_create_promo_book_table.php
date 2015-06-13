<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePromoBookTable extends Migration {

	public function up()
	{
		Schema::create('promo_book', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('book_id');
			$table->integer('promotion_id');
		});
	}

	public function down()
	{
		Schema::drop('promo_book');
	}
}