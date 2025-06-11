<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request) {
        $data = $request->validate([
            'name' => ['required', 'min:4', 'max:16', Rule::unique('users', 'name')], 
            'email' => ['required', 'email'], 
            'password' => ['required', 'min:8', 'max:64']
        ]);

        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        auth()->login($user);

        return redirect('/');
    }

    public function login(Request $request) {
        $data = $request->validate([
            'login-name' => 'required',
            'login-psw' => 'required'
        ]);

        if (auth()->attempt(['name' => $data['login-name'], 'password' => $data['login-psw']])) {
            $request->session()->regenerate();
        }

        return redirect('/');
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }
}
