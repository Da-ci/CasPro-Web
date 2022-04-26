<?php

namespace App\Http\Controllers;

use App\Http\Requests\createLivreur;
use App\Http\Requests\deleteLivreur;
use App\Http\Requests\displayLivreur;
use App\Http\Requests\updateLivreur;
use App\Models\Livreur;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LivreurController extends Controller
{
    public function displayLivreur(displayLivreur $request){

        $Livreurs = User::find($request->id)->livreurs;

        return $Livreurs;
    }

    public function createLivreur(createLivreur $request){

        $validated = $request->validated();

        $livreur = livreur::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'user_id' => $request->user_id
        ]);
    }

    public function updateLivreur(updateLivreur $request){

        $validated = $request->validated();

        $livreur = Livreur::find($request->id);

        $livreur->update([
            'name' => $request->name,
            'phone' => $request->phone
        ]);
    }

    public function deleteLivreur(deleteLivreur $request){

        $validated = $request->validated();

        $livreur = Livreur::find($request->id);

        $livreur->delete();
    }
}
