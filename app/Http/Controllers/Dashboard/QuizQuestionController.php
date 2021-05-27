<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizQuestionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function createQuestion($id)
    {
        $quiz = Quiz::findOrFail($id);
        return view('dashboard.pages.quizzes.create-question', compact('quiz'));
    }

    public function storeQuestion(Request $request)
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

        return redirect()->route('dashboard.quizzes.show', $request['quiz_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return void
     */
    public function destroyQuestion(Request $request)
    {
        $question = Question::findOrFail($request->id);

        $question->delete();

        alert()->error('Question Deleted Successfully');

        return redirect()->back();
    }
}
