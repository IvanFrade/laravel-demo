<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request) {
        $data = $request->validate([
            'username' => ['required', 'min:4', 'max:16'], 
            'email' => ['required', 'email'], 
            'password' => ['required', 'min:8', 'max:64']
        ]);

        $data['password'] = bcrypt($data['password']);
        $data['isAdmin'] = 0;
        $user = User::create($data);
        auth()->login($user);

        return redirect('/');
    }

    public function login(Request $request) {
        $data = $request->validate([
            'login-username' => 'required',
            'login-psw' => 'required'
        ]);

        if (auth()->attempt(['username' => $data['login-username'], 'password' => $data['login-psw']])) {
            $request->session()->regenerate();
        }

        return redirect('/');
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }
}
