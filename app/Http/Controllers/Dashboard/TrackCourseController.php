<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrackCourseController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function createCourse($id)
    {
        $track = Track::findOrFail($id);

        return view('dashboard.pages.tracks.create-course', compact('track'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Course $track
     * @return \Illuminate\Http\Response
     */
    public function storeCourse(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
//            'image' => 'image',
            'link' => 'url',
        ]);

        $data = $request->except(['image', 'status']);

        if ($request->hasFile('image') && $request['image'] != null) {
            $fileName = $request->file('image')->hashName();
            $request->file('image')->move(public_path('dashboard/images/courses'), $fileName);
            $data['image'] = $fileName;
        }

        if ($request['status'] == 1) {
            $data['status'] = true;
        } else {
            $data['status'] = false;
        }

        Course::create($data);

        alert()->success('Course Created Successfully');

        return redirect()->route('dashboard.tracks.show', $request['track_id']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return void
     */
    public function destroyCourse(Request $request)
    {
        $course = Course::findOrFail($request->id);

        if ($course['image'] != 'course_default.jpg') {
            Storage::disk('dashboard')->delete('courses/' . $course->image);
        }

        $course->delete();

        alert()->error('Course Deleted Successfully');

        return redirect()->back();
    }
}
