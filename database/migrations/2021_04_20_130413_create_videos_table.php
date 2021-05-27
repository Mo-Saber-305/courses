<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVideosTable extends Migration {

	public function up()
	{
		Schema::create('videos', function(Blueprint $table) {
			$table->id();
			$table->bigInteger('course_id')->unsigned();
			$table->string('title');
			$table->string('link')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('videos');
	}
}
