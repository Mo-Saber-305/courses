<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Quiz;
use Illuminate\Http\Request;

class CourseQuizController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function createQuiz($id)
    {
        $course = Course::findOrFail($id);
        return view('dashboard.pages.courses.create-quiz', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeQuiz(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'course_id' => 'required',
        ]);

        Quiz::create($request->all());

        alert()->success('Quiz Created Successfully');

        return redirect()->route('dashboard.courses.show', $request['course_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return void
     */
    public function destroyQuiz(Request $request)
    {
        $quiz = Quiz::findOrFail($request->id);

        $quiz->delete();

        alert()->error('Quiz Deleted Successfully');

        return redirect()->back();
    }
}
