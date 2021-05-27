<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuizUserTable extends Migration {

	public function up()
	{
		Schema::create('quiz_user', function(Blueprint $table) {
			$table->bigInteger('user_id')->unsigned();
			$table->bigInteger('quiz_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('quiz_user');
	}
}
