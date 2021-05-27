<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Quiz;
use Faker\Generator as Faker;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::withCount('questions')->latest()->get();
        return view('dashboard.pages.quizzes.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('dashboard.pages.quizzes.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'course_id' => 'required',
        ]);

        Quiz::create($request->all());

        alert()->success('Quiz Created Successfully');

        return redirect()->route('dashboard.quizzes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Quiz $quiz
     * @param Faker $faker
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz, Faker $faker)
    {
        return view('dashboard.pages.quizzes.show', compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Quiz $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        $courses = Course::all();
        return view('dashboard.pages.quizzes.edit', compact('quiz', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Quiz $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'name' => 'required',
            'course_id' => 'required',
        ]);

        $quiz->update($request->all());

        alert()->success('Quiz Updated Successfully');

        return redirect()->route('dashboard.quizzes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return void
     */
    public function destroy(Request $request)
    {
        $quiz = Quiz::findOrFail($request->id);

        $quiz->delete();

        alert()->error('Quiz Deleted Successfully');

        return redirect()->route('dashboard.quizzes.index');
    }
}
