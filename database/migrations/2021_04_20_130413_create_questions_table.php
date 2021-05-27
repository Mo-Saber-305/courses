<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionsTable extends Migration {

	public function up()
	{
		Schema::create('questions', function(Blueprint $table) {
			$table->id();
			$table->string('title');
			$table->string('answers');
			$table->string('right_answer');
			$table->integer('score')->default('0');
			$table->bigInteger('quiz_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('questions');
	}
}
