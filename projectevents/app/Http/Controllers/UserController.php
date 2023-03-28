<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = array('admin', 'manager', 'user');
        $users = User::orderBy('name', 'asc')->get();
        return view('users.index', compact('users', 'roles'));
    }

    //list users by role
    public function userByrole(Request $request)
    {
        $roles = array('admin', 'manager', 'user');
        $data = $request->all();
        $selectRole = $data['role'];
        if ($data['role'] == "0") {
            return redirect('/users');
        } else {
            $users = User::where('role', 'LIKE', $data['role'])->get();
            return view('users.index', compact('users', 'roles', 'selectRole'));
        }
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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',

        ]);

        //Запрос на добавление пользователя
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return redirect('users');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
