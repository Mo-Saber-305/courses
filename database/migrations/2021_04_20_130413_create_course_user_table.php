<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourseUserTable extends Migration {

	public function up()
	{
		Schema::create('course_user', function(Blueprint $table) {
			$table->bigInteger('user_id')->unsigned();
			$table->bigInteger('course_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('course_user');
	}
}
