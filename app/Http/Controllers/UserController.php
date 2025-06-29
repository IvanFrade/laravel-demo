<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request) {
        $data = $request->validate([
            'username' => ['required', 'min:4', 'max:16', 'unique:users,username'], 
            'email' => ['required', 'email', 'unique:users,email'], 
            'password' => ['required', 'min:8', 'max:64', 'confirmed']
        ]);

        $data['password'] = bcrypt($data['password']);
        $data['isAdmin'] = 0;
        $user = User::create($data);
        auth()->login($user);

        return redirect('/home');
    }

    public function login(Request $request) {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt(['username' => $data['username'], 'password' => $data['password']])) {
            $request->session()->regenerate();
            return redirect('/home');
        }
        else
            return back()->withErrors([
                'login' => "Credenziali non corrette"
            ])->withInput();

    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }
}
