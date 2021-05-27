<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::latest()->get();
        return view('dashboard.pages.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quizzes = Quiz::all();
        return view('dashboard.pages.questions.create', compact('quizzes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['answers']);
        $request->validate([
            'title' => 'required',
            'answers' => ['required', 'array', 'min:3', 'max:4'],
            'right_answer' => 'required',
            'score' => 'required|integer|gt:0',
            'quiz_id' => 'required|integer',
        ]);

        $data['answers'] = json_encode($request->answers);

        Question::create($data);

        alert()->success('Question Created Successfully');

        return redirect()->route('dashboard.questions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Question $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $quizzes = Quiz::all();
        $answers = json_decode($question->answers);
        return view('dashboard.pages.questions.edit', compact('question', 'quizzes', 'answers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $request->validate([
            'title' => 'required',
            'answers' => ['required', 'array', 'min:3', 'max:4'],
            'right_answer' => 'required',
            'score' => 'required|integer|gt:0',
            'quiz_id' => 'required|integer',
        ]);

        $data = $request->except(['answers']);

        $data['answers'] = json_encode($request->answers);

        $question->update($data);

        alert()->success('Question Updated Successfully');

        return redirect()->route('dashboard.questions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return void
     */
    public function destroy(Request $request)
    {
        $question = Question::findOrFail($request->id);

        $question->delete();

        alert()->error('Question Deleted Successfully');

        return redirect()->route('dashboard.questions.index');
    }
}
