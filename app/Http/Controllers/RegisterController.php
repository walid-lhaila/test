<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PharIo\Manifest\Email;

class RegisterController extends Controller
{
    public function register(){
        return view('register');
    }


    public function clientStore(Request $request){
        $validatedData = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string|min:8', // You may need to adjust the validation rules
        ]);

        // Create a new user
        $user = new User([
            'fname' => $validatedData['fname'],
            'lname' => $validatedData['lname'],
            'phone' => $validatedData['phone'],
            'ville' => $validatedData['ville'],
            'role' => $validatedData['role'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Save the user to the database
        $user->save();

        // Redirect or return a response as needed
        return view('login');
    }   


    public function proprietaireStore(Request $request){
        $validatedData = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        $user = new User([
            'fname' => $validatedData['fname'],
            'lname' => $validatedData['lname'],
            'phone'=> $validatedData['phone'],
            'ville' => $validatedData['ville'],
            'role' => $validatedData['role'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $user->save();

        return view('login');
    }   
}

