<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuizzesTable extends Migration {

	public function up()
	{
		Schema::create('quizzes', function(Blueprint $table) {
			$table->id();
			$table->bigInteger('course_id')->unsigned();
			$table->string('name');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('quizzes');
	}
}
