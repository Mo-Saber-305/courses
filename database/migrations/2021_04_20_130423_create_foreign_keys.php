<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('courses', function(Blueprint $table) {
			$table->foreign('track_id')->references('id')->on('tracks')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('videos', function(Blueprint $table) {
			$table->foreign('course_id')->references('id')->on('courses')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('quizzes', function(Blueprint $table) {
			$table->foreign('course_id')->references('id')->on('courses')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('questions', function(Blueprint $table) {
			$table->foreign('quiz_id')->references('id')->on('quizzes')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('course_user', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('course_user', function(Blueprint $table) {
			$table->foreign('course_id')->references('id')->on('courses')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('quiz_user', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('quiz_user', function(Blueprint $table) {
			$table->foreign('quiz_id')->references('id')->on('quizzes')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('track_user', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('track_user', function(Blueprint $table) {
			$table->foreign('track_id')->references('id')->on('tracks')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('courses', function(Blueprint $table) {
			$table->dropForeign('courses_track_id_foreign');
		});
		Schema::table('videos', function(Blueprint $table) {
			$table->dropForeign('videos_course_id_foreign');
		});
		Schema::table('quizzes', function(Blueprint $table) {
			$table->dropForeign('quizzes_quiz_id_foreign');
		});
		Schema::table('questions', function(Blueprint $table) {
			$table->dropForeign('questions_quiz_id_foreign');
		});
		Schema::table('course_user', function(Blueprint $table) {
			$table->dropForeign('course_user_user_id_foreign');
		});
		Schema::table('course_user', function(Blueprint $table) {
			$table->dropForeign('course_user_course_id_foreign');
		});
		Schema::table('quiz_user', function(Blueprint $table) {
			$table->dropForeign('quiz_user_user_id_foreign');
		});
		Schema::table('quiz_user', function(Blueprint $table) {
			$table->dropForeign('quiz_user_quiz_id_foreign');
		});
		Schema::table('track_user', function(Blueprint $table) {
			$table->dropForeign('track_user_user_id_foreign');
		});
		Schema::table('track_user', function(Blueprint $table) {
			$table->dropForeign('track_user_track_id_foreign');
		});
	}
}
