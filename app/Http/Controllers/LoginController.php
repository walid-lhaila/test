<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(){
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'client') {
                return redirect()->route('clientDashboard'); // Adjust the route name as needed
            } elseif ($user->role === 'proprietaire') {
                return redirect()->route('proprietaireDashboard'); // Adjust the route name as needed
            } else {
                return redirect('/'); // Redirect to a default page
            }
        } else {
            // Authentication failed
            return redirect()->back()->withInput()->withErrors(['email' => 'Invalid email or password']);
        }
    }
}
