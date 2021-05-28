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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tracks_data = Track::limit(6)->get();

        return view('welcome', compact('tracks_data'));
    }

    function loadTrackData(Request $request)
    {
        if ($request->ajax()) {
            if ($request->id > 0) {
                $tracks = Track::where('id', '>', $request->id)->limit(6)->get();
            } else {
                $tracks = Track::limit(6)->get();
            }
            $output = '';
            $last_id = '';

            if (!$tracks->isEmpty()) {
                foreach ($tracks as $track) {
                    $output .= '
                        <div class="col-lg-4 col-md-6">
                            <a href="" style="color: unset">
                                <div class="categorie-item text-center">
                                    <div class="ci-thumb set-bg" data-setbg="' . asset('dashboard/images/tracks/' . $track->image_path) . '"
                                    style=\'background: url("' . $track->image_path . '")\'></div>
                                    <div class="ci-text">
                                        <h5>' . $track->name . '</h5>
                                        <span>' . $track->courses_count . ' courses' . '</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    ';
                    $last_id = $track->id;
                }

                $output .= '
                    <div id="remove-row" class="col-12 text-center">
                        <button type="button" name="load_more_button" class="site-btn" 
                        data-id="' . $last_id . '" id="btn-more">Load More</button>
                    </div>
                ';
            }

            echo $output;
        }
    }
}
