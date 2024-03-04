<?php

namespace App\Http\Controllers;

use App\Models\annonces;
use Illuminate\Http\Request;

class AnnoncesController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(annonces $annonces)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(annonces $annonces)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, annonces $annonces)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $annonce = Annonces::find($id);
        if ($annonce) {
            $annonce->delete();
            return redirect()->back()->with('Annonce Deleted Success');
        } 
    }
}
