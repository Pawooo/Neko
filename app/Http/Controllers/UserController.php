<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    //Show User Registration Form
    public function create(){
        return view('users.register');
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => 'required|min:3',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            // Confirmed will look for another field appended with _confirmation
            'password' => 'required|confirmed|min:6',
            'praise' =>  'nullable'
        ]);
        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        // Login
        return redirect('/')->with('message', 'User created and logged in');
    }
    
    // Logout User
    public function logout(Request $request) {
        // Move auth information from the user session
        auth()->logout();
        // Invalidate user session and regenerate their csrf token
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // Redirect 
        return redirect('/')->with('message', 'Logged out!');
    }


    // Login User
    public function login(){
        return view('users.login');
    }

    // Auth User
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        // You do it this way to preven people from handpicking the correct login and password by feeding them the corresponding error message
        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Nice to see you again!');
        } 
        // You do it this way to preven people from handpicking the correct login and password by feeding them the corresponding error message
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
