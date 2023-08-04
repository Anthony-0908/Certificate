<?php

namespace App\Http\Controllers;

use App\Models\certificates;
use App\Models\User;
use App\Models\lessons;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Support\ValidatedData;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $lessons = lessons::all();

        //
        $users = User::all();
        return view ('users.view',compact('users', 'lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function certificate(Request $request)
    {
        $lessonID = $request->input('lessonid');
        certificates::create([
            'user_id' =>  $request->input('userid'),

            'lesson_id' => $lessonID,
        ]);


       return redirect()->route('user.index')->with('success', 'certificate created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'password' => 'sometimes|string|max:8',
        ]);



        $user->update([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ]);



        return redirect()->route('user.index')->with('success', 'User is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect()->route('user.index')->with('success','User is deleted');
    }
}
