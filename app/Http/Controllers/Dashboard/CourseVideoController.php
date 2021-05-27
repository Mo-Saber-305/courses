<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Video;
use Illuminate\Http\Request;

class CourseVideoController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function createVideo($id)
    {
        $course = Course::findOrFail($id);

        return view('dashboard.pages.courses.create-video', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Course $course
     * @return \Illuminate\Http\Response
     */
    public function storeVideo(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'link' => 'required|url',
            'course_id' => 'required',
        ]);

        Video::create($request->all());

        alert()->success('Video Created Successfully');

        return redirect()->route('dashboard.courses.show', $request['course_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return void
     */
    public function destroyVideo(Request $request)
    {
        $video = Video::findOrFail($request['id']);

        $video->delete();

        alert()->error('Video Deleted Successfully');

        return redirect()->back();
    }
}
