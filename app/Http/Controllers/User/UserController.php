<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user); 
        return redirect('user.index'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('user.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user) {
        return view('user.users.edit', compact('user'));
    }

    public function update(Request $request, User $user) {
        $user->update($request->only('name', 'email', 'password')); 
        return redirect()->route('users.index');
    }

    public function destroy(User $user) {
        $user->delete();
        return back();
    }

     public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); 
            return redirect()->intended('/user.index'); 
        }

        return back()->withErrors([
            'email' => 'Email yoki parol noto‘g‘ri.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/users.create');
    }
}
