<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'HomeController@index');

/***************************************************************************************************/
/**************************************** Dashboard Routes *****************************************/
/***************************************************************************************************/

Route::middleware(['auth', 'admin'])->name('dashboard.')->prefix('dashboard')
    ->name('dashboard.')->namespace('Dashboard')
    ->group(function () {

        Route::get('home', 'HomeController@index')->name('home');

        //admins routes
        Route::resource('admins', 'AdminController')->except(['show', 'destroy']);
        Route::delete('admins/destroy', 'AdminController@destroy')->name('admins.destroy');

        //users routes
        Route::resource('users', 'UserController')->except(['destroy']);
        Route::delete('users / destroy', 'UserController@destroy')->name('users.destroy');

        //tracks routes
        Route::resource('tracks', 'TrackController')->except(['destroy']);
        Route::delete('tracks / destroy', 'TrackController@destroy')->name('tracks.destroy');

        //track course routes
        Route::get('track - course - create /{
            trackId}', 'TrackCourseController@createCourse')->name('track.course.create');
        Route::post('track - course - store', 'TrackCourseController@storeCourse')->name('track.course.store');
        Route::delete('track - course - destroy', 'TrackCourseController@destroyCourse')->name('track.course.destroy');

        //courses routes
        Route::resource('courses', 'CourseController')->except('destroy');
        Route::delete('courses / destroy', 'CourseController@destroy')->name('courses.destroy');

        //course video routes
        Route::get('course - video - create /{
            courseId}', 'CourseVideoController@createVideo')->name('course.videos.create');
        Route::post('course - video - store', 'CourseVideoController@storeVideo')->name('course.videos.store');
        Route::delete('course - video - destroy', 'CourseVideoController@destroyVideo')->name('course.videos.destroy');

        //course quiz routes
        Route::get('course - quiz - create /{
            courseId}', 'CourseQuizController@createQuiz')->name('course.quizzes.create');
        Route::post('course - quiz - store', 'CourseQuizController@storeQuiz')->name('course.quizzes.store');
        Route::delete('course - quiz - destroy', 'CourseQuizController@destroyQuiz')->name('course.quizzes.destroy');

        //videos routes
        Route::resource('videos', 'VideoController')->except(['destroy']);
        Route::delete('videos / destroy', 'VideoController@destroy')->name('videos.destroy');

        //quizzes routes
        Route::resource('quizzes', 'QuizController')->except(['destroy']);
        Route::delete('quizzes / destroy', 'QuizController@destroy')->name('quizzes.destroy');

        //quiz question routes
        Route::get('quiz - question - create /{
            quizId}', 'QuizQuestionController@createQuestion')->name('quiz.questions.create');
        Route::post('quiz - question - store', 'QuizQuestionController@storeQuestion')->name('quiz.questions.store');
        Route::delete('quiz - question - destroy', 'QuizQuestionController@destroyQuestion')->name('quiz.questions.destroy');

        //questions routes
        Route::resource('questions', 'QuestionController')->except(['show', 'destroy']);
        Route::delete('questions / destroy', 'QuestionController@destroy')->name('questions.destroy');

    });
