<?php

namespace App\Http\Controllers;

use App\Models\Annonces;
use App\Models\Reservation;
use App\Models\reservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function reserve(Annonces $annonce)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Create a reservation
            Reservation::create([
                'annonce_id' => $annonce->id,
                'user_id' => Auth::id(),
            ]);

            return redirect()->back()->with('success', 'Reservation successful!');
        } else {
            return redirect()->back()->with('error', 'You need to be logged in to reserve.');
        }
    }

}
