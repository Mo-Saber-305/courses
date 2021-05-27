<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesTable extends Migration
{

    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('track_id');
            $table->string('title');
            $table->text('description');
            $table->string('link')->nullable();
            $table->string('image')->default('course_default.jpg');
            $table->boolean('status')->default(0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('courses');
    }
}
