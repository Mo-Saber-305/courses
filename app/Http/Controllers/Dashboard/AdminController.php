<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('owner');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::where('type', 'admin')
            ->where('id', '!=', auth()->user()->id)
            ->where('email', '!=', 'admin@demo.com')
            ->latest()->get();

        return view('dashboard.pages.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.admins.create');
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
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
        ]);

        $data = $request->except(['image', 'password_confirmation', 'password']);

        if ($request->has('image') && $request->image != null) {
            $fileName = $request->file('image')->hashName();
            $request->file('image')->move(public_path('dashboard/images/users'), $fileName);

            $data['image'] = $fileName;
        }

        $data['password'] = Hash::make($request->password);

        $data['type'] = 'admin';

        User::create($data);

        alert()->success('Track Created Successfully');

        return redirect()->route('dashboard.admins.index');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param User $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {
        return view('dashboard.pages.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $admin = User::findOrFail($id);
//        dd($admin);
        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($admin->id)
            ]
        ]);

        $data = $request->except(['image']);

        if ($request->has('image') && $request->image != null) {
            if ($admin->image != 'default_user.jpg') {
                Storage::disk('dashboard')->delete('users/' . $admin->image);
            }
            $fileName = $request->file('image')->hashName();
            $request->file('image')->move(public_path('dashboard/images/users'), $fileName);

            $data['image'] = $fileName;
        }

        $data['type'] = 'admin';

        $admin->update($data);

        alert()->success('Track Updated Successfully');

        return redirect()->route('dashboard.admins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $admin = User::findOrFail($request->id);

        if ($admin->image != 'default_user.jpg') {
            Storage::disk('dashboard')->delete('users/' . $admin->image);
        }

        $admin->delete();

        alert()->success('Track Deleted Successfully');

        return redirect()->route('dashboard.admins.index');
    }
}
