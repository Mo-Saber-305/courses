<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrackUserTable extends Migration {

	public function up()
	{
		Schema::create('track_user', function(Blueprint $table) {
			$table->bigInteger('user_id')->unsigned();
			$table->bigInteger('track_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('track_user');
	}
}
