<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNewsletterTable extends Migration {

	public function up()
	{
		Schema::create('newsletter', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('first_name', 50);
			$table->string('last_name', 50);
			$table->string('email', 100);
		});
	}

	public function down()
	{
		Schema::drop('newsletter');
	}
}