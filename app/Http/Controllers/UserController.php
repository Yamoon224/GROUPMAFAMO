<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use App\Services\Fpdf\App;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::all();
        $users = User::orderByDesc('id')->get();
        return view('admin.users', compact('users', 'groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:40',
            'email' => 'required|string|max:255',
            'group_id' => 'required',
            'password' => ['required', 'confirmed', Password::defaults()]
        ]);
        
        $data = $request->except(['_token', 'password_confirmation']);
        User::create($data);
        return redirect()->route('users.index')->with(['message'=>'']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $groups = Group::all();
        $user = User::find($id);
        return view('admin.users.edit', compact('user', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {       
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:40',
            'email' => 'required|string|max:255',
            'group_id' => 'required|int'
        ]);

        $user = User::find($id);
        $data = $request->except(['_method', '_token']);
        $user->update($data);

        return redirect()->route('users.index')->with(['message'=>'']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return back()->with(['message'=>'']);
    }
    
    public function getAppointmentsPdf()
    {
        $users = User::all();
        // return (new App)->usersTable($users);
    }
}
