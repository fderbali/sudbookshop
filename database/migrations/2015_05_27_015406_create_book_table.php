<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookTable extends Migration {

	public function up()
	{
		Schema::create('book', function(Blueprint $table) {
			$table->increments('id');
			$table->string('isbn', 20)->unique();
			$table->string('title', 150);
			$table->text('brief_description');
			$table->text('full_description');
			$table->string('author', 100);
			$table->float('price');
			$table->float('shipping_cost')->nullable();
			$table->text('additional_infos');
			$table->tinyInteger('additional_docs');
			$table->datetime('created_at');
			$table->integer('in_stock');
			$table->string('size', 45)->nullable();
			$table->integer('category_id');
		});
	}

	public function down()
	{
		Schema::drop('book');
	}
}