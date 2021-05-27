<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param UsersDataTable $usersDataTable
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('type', 'user')->latest()->get();
        return view('dashboard.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pages.users.create');
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

        return redirect()->route('dashboard.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.pages.users.edit', compact('user'));
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
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($user->id)
            ]
        ]);

        $data = $request->except(['image']);

        if ($request->has('image') && $request->image != null) {
            if ($user->image != 'default_user.jpg') {
                Storage::disk('dashboard')->delete('users/' . $user->image);
            }
            $fileName = $request->file('image')->hashName();
            $request->file('image')->move(public_path('dashboard/images/users'), $fileName);

            $data['image'] = $fileName;
        }

        $data['type'] = 'user';

        $user->update($data);

        alert()->success('Track Updated Successfully');

        return redirect()->route('dashboard.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);

        if ($user->image != 'default_user.jpg') {
            Storage::disk('dashboard')->delete('users/' . $user->image);
        }

        $user->delete();

        alert()->error('Track Deleted Successfully');

        return redirect()->route('dashboard.users.index');
    }

}
