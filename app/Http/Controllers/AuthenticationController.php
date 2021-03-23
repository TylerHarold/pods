<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            "username" => "required",
            "email" => "required|email",
            "password" => "required",
            "cpassword" => "required"
        ]);

        if ($validator->fails()) return view('/register');

        $userPayload = [
            "username" => $request->input("username"),
            "email" => $request->input("email"),
            "password" => Hash::make($request->input("password")),
            "cpassword" => $request->input("cpassword")
        ];

        // If email exists
        if (DB::table('users')->where('email', $userPayload['email'])->exists()) {
            $this->viewParams['error'] = "The entered email address already exists";
            return view('/register')->with($this->viewParams);
        }
        // If username exists
        if (DB::table('users')->where('username', $userPayload['username'])->exists()) {
            $this->viewParams['error'] = "The entered username already exists";
            return view('/register')->with($this->viewParams);
        }
        // If username is not between 3-16 characters long
        if (strlen($userPayload['username']) < 3 || strlen($userPayload['username']) > 16) {
            $this->viewParams['error'] = "Your name must contain between 3-16 characters.";
            return view('/register')->with($this->viewParams);
        }
        // If username contains invalid characters
        if (!preg_match('/[a-zA-Z0-9_]+/', $userPayload['name'])) {
            $this->viewParams['error'] = "Your username cannot contain invalid characters or spaces.";
            return view('/register')->with($this->viewParams);
        }
        // If password is less than 6 characters long
        if (strlen($request->input('password')) < 6) {
            $this->viewParams['error'] = "Your password must be at least 6 characters long.";
            return view('/register')->with($this->viewParams);
        }
        // If password doesn't equal confirm password
        if ($request->input('password') != $request->input('cpassword')) {
            $this->viewParams['error'] = "Your passwords did not match.";
            return view('/register')->with($this->viewParams);
        }

        $user = User::create($userPayload);

        Auth::login($user);

        return redirect()->to('/profile');
    }

    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required"
        ]);

        if ($validator->fails()) return view('/login');

        $userPayload = [
            "email" => $request->input("email"),
            "password" => $request->input("password")
        ];

        $user = DB::table('users')->where('email', $userPayload['email'])->first();

        // If user doesn't exist
        if (!DB::table('users')->where('email', $userPayload['email'])->exists()) {
            $this->viewParams['error'] = "The entered email doesn't exist.";
            return view('/login')->with($this->viewParams);
        }

        // If password doesn't match
        if (!Hash::check($userPayload['password'], $user->password)) {
            $this->viewParams['error'] = "Your email address or password is incorrect.";
            return view('/login')->with($this->viewParams);
        }

        // Attempt to login
        Auth::attempt($userPayload);

        return redirect()->to('/profile');
    }

    public function logout() {
        Auth::logout();

        $this->viewParams['info'] = "You have been logged out.";
        return view('/login')->with($this->viewParams);
    }
}
