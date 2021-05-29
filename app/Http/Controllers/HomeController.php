<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return string
     */
    public function index(Request $request)
    {


        return view('welcome');
    }

    function loadTrackData(Request $request)
    {
        $tracks_data = Track::withCount('courses')->orderBy('courses_count', 'desc')->paginate(6);

        $lastPage = $tracks_data->lastPage();

        $html = '';

        foreach ($tracks_data as $track) {
            $html .= '
                <div class="col-lg-4 col-md-6">
                    <a href="' . route("tracks.show", $track->id) . '" style="color: unset">
                        <div class="categorie-item text-center">
                            <div class="ci-thumb " style=\'background: url("' . $track->image_path . '")\'></div>
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
}
