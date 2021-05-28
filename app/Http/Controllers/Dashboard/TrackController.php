<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tracks = Track::withCount('courses')->latest()->get();
        return view('dashboard.pages.tracks.index', compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.tracks.create');
    }

    /**
     * Display the specified resource.
     *
     * @param Track $track
     * @return void
     */
    public function show(Track $track)
    {
        return view('dashboard.pages.tracks.show', compact('track'));
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
            'name' => ['required', 'unique:tracks']
        ]);

        $data = $request->except(['image']);

        if ($request->hasFile('image') && $request['image'] != null) {
            $fileName = $request->file('image')->hashName();
            $request->file('image')->move(public_path('dashboard/images/tracks'), $fileName);
            $data['image'] = $fileName;
        }

        Track::create($data);

        alert()->success('Track Created Successfully');

        return redirect()->route('dashboard.tracks.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Track $track
     * @return void
     */
    public function edit(Track $track)
    {
        return view('dashboard.pages.tracks.edit', compact('track'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Track $track
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Track $track)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('tracks')->ignore('id')
            ]
        ]);

        $data = $request->except(['image']);

        if ($request->hasFile('image') && $request['image'] != null) {
            if ($track['image'] != 'tracks_default.jpg') {
                Storage::disk('dashboard')->delete('tracks/' . $track->image);
            }

            $fileName = $request->file('image')->hashName();

            $request->file('image')->move(public_path('dashboard/images/tracks'), $fileName);

            $data['image'] = $fileName;
        }

        $track->update($data);

        alert()->success('Track Updated Successfully');

        return redirect()->route('dashboard.tracks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $track = Track::findOrFail($request['id']);

        if ($track['image'] != 'tracks_default.jpg') {
            Storage::disk('dashboard')->delete('tracks/' . $track->image);
        }

        $track->delete();

        alert()->error('Track Deleted Successfully');

        return redirect()->route('dashboard.tracks.index');
    }
}
