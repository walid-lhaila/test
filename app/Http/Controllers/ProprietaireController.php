<?php

namespace App\Http\Controllers;

use App\Models\Annonces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProprietaireController extends Controller
{
    public function dashboard(){
       $annonces = Annonces::with('user')->get();

        return view('proprietaire.proprietaireDashboard', compact('annonces'));
    }
    
    public function annonces(){
        $userId = auth()->id();
        $annonces = Annonces::with('user')->where('user_id', $userId)->get();
        return view('proprietaire.proprietaireAnnonces', compact('annonces'));
    }
    public function addAnnonces(Request $request){
        $validatedData = $request->validate([
            'type_annonce' => 'required|string|max:255',
            'type_bien' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $userId = Auth::id();

        $annonces = new Annonces([
            'type_annonce' => $validatedData['type_annonce'],
            'type_bien' => $validatedData['type_bien'],
            'description' => $validatedData['description'],
            'user_id' => $userId,
        ]);

        $annonces->save();

        return redirect()->back()->with('annonces added successfully');
    }
}
