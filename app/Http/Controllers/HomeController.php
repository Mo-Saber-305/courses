<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return string
     */
    public function index()
    {
        $tracks_data = Track::withCount('courses')->orderBy('courses_count', 'desc')->limit(6)->get();

        return view('frontend.pages.home', compact('tracks_data'));
    }

    function loadTracksData(Request $request)
    {
        $tracks_data = Track::withCount('courses')->orderBy('courses_count', 'desc')->paginate(6);

        $lastPage = $tracks_data->lastPage();

        $html = '';

        foreach ($tracks_data as $track) {
            $html .= '
                <div class="col-lg-4 col-md-6 track hvr-grow">
                    <a href="' . route("tracks.show", $track->id) . '" style="color: unset">
                        <div class="categorie-item text-center hvr-sweep-to-top">
                            <div class="ci-thumb " style=\'background-image: url("' . $track->image_path . '"); background-repeat: no-repeat\'></div>
                            <div class="ci-text">
                                <h5>' . $track->name . '</h5>
                                <span>' . $track->courses_count . ' courses' . '</span>
                            </div>
                        </div>
                    </a>
                </div>
            ';
        }

        if ($request->ajax()) {
            return response()->json(['html' => $html, 'last_page' => $lastPage]);
        }
    }

    function loadCoursesData(Request $request)
    {
        $tracks_data = Track::withCount('courses')->orderBy('courses_count', 'desc')->limit(6);

        if ($request->id == 'all') {
            $courses_data = Course::with(['track', 'videos', 'users'])->withCount(['videos', 'users'])
                ->orderBy('users_count', 'desc')->paginate(4);
        } else {
            $courses_data = Course::with(['track', 'videos', 'users'])->withCount(['videos', 'users'])
                ->where('track_id', $request->id)
                ->orderBy('users_count', 'desc')->paginate(4);
        }


        $lastPage = $courses_data->lastPage();

        $html = '';

        foreach ($courses_data as $course) {
            $html .= '
                <div class="mix col-lg-3 text-center col-md-4 col-sm-6 hvr-grow ' . str_replace(' ', '-', $course->track->id) . '">
                    <a href="' . route('courses.show', $course->id) . '">
                        <div class="course-item">
                            <div class="course-thumb">
                            <img src="' . $course->image_path . '" alt="" style="max-height: 100%;width: 100%;">
                                <div class="price"> Price: ' . ($course->status == 1 ? '$' . $course->price : 'free') . '</div>
                            </div>
                            <div class="course-info">
                                <div class="course-text">
                                    <a href="' . route('courses.show', $course->id) . '" style="color: unset">
                                        <h5 data-toggle="tooltip" data-placement="top" title="' . $course->title . '">' . Str::limit($course->title, 30) . '</h5>
                                    </a>
                                    <a href="' . route('tracks.show', $course->track_id) . '" class="h6 mb-4 text-muted font-weight-bold" style="color: unset">' . $course->track->name . '</a>
                                    <div class="students">' . $course->users_count . ' Students</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            ';
        }

        if ($request->ajax()) {
            return response()->json([
                'html' => $html,
                'last_page' => $lastPage,
            ]);
        }


    }

}
