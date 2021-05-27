<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::withCount('users')->latest()->get();
        return view('dashboard.pages.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tracks = Track::all();
        return view('dashboard.pages.courses.create', compact('tracks'));
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

        return redirect()->route('dashboard.courses.index');

    }

    /**
     * Display the specified resource.
     *
     * @param Course $course
     * @return void
     */
    public function show(Course $course)
    {
        return view('dashboard.pages.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Course $course
     * @return void
     */
    public function edit(Course $course)
    {
        $tracks = Track::all();
        return view('dashboard.pages.courses.edit', compact('course', 'tracks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Course $course
     * @return void
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'required',
        ]);

        $data = $request->except(['image', 'status']);

        if ($request->hasFile('image') && $request['image'] != null) {
            if ($course['image'] != 'course_default.jpg') {
                Storage::disk('dashboard')->delete('courses/' . $course->image);
            }

            $fileName = $request->file('image')->hashName();

            $request->file('image')->move(public_path('dashboard/images/courses'), $fileName);

            $data['image'] = $fileName;
        }

        if ($request['status'] == 1) {
            $data['status'] = true;
        } else {
            $data['status'] = false;
        }

        $course->update($data);

        alert()->success('Course Updated Successfully');

        return redirect()->route('dashboard.courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return void
     */
    public function destroy(Request $request)
    {
        $course = Course::findOrFail($request->id);

        if ($course['image'] != 'course_default.jpg') {
            Storage::disk('dashboard')->delete('courses/' . $course->image);
        }

        $course->delete();

        alert()->error('Course Deleted Successfully');

        return redirect()->route('dashboard.courses.index');
    }
}
