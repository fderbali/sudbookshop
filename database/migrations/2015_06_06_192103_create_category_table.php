<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryTable extends Migration {

	public function up()
	{
		Schema::create('category', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 100);
			$table->integer('section_id')->unsigned();
                        $table->foreign('section_id')
                              ->references('id')
                              ->on('section')
                              ->onDelete('restrict')
                              ->onUpdate('restrict');
		});
	}

	public function down()
	{
            	Schema::table('category', function(Blueprint $table) {
                    $table->dropForeign('category_section_id_foreign');
		});
		Schema::drop('category');
	}
}