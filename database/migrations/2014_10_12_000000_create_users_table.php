<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('user', function(Blueprint $table) {
                    $table->increments('id');
                    $table->boolean('is_admin')->default(0);
                    $table->string('password', 100);
                    $table->string('email', 100)->unique();
                    $table->string('first_name', 50);
                    $table->string('last_name', 50);
                    $table->string('phone', 20);
                    $table->string('billing_address1', 200);
                    $table->string('billing_address2', 200);
                    $table->string('zip_code', 10);
                    $table->string('city', 50);
                    $table->string('country', 50);
                    $table->rememberToken();
                    $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('user');
	}
}