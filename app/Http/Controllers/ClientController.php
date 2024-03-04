<?php

namespace App\Http\Controllers;

use App\Models\Annonces;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function dashboard(){
        $annonces = Annonces::with('user')->get();
        return view('client.clientDashboard', compact('annonces'));
    }

    public function addAnnonce(Request $request){
        $validateData = $request->validate([
            'type_annonce' => 'required|string|max:255',
            'type_bien' => 'required|string|max:255',
            'description' => 'required|string|max:255',    
        ]);

        $userId = Auth::id();

        $annonces = new Annonces([
            'type_annonce' => $validateData['type_annonce'],
            'type_bien' => $validateData['type_bien'],
            'description' => $validateData['description'],
            'user_id' => $userId,
        ]);

        $annonces->save();

        return redirect()->back()->with('Annonce Add Sucess');

    }

    public function annonces(){
        $userId = auth()->id();
        $annonces = Annonces::with('user')->where('user_id', $userId)->get();
        return view('client.clientAnnonces', compact('annonces'));
    }

    public function reservations(){
        $reservations = Reservation::with(['annonce.user', 'user'])->get();
        return view('client.clientReservations', compact('reservations'));
    }
}
