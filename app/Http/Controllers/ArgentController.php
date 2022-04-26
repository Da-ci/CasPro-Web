<?php

namespace App\Http\Controllers;

use App\Models\Argent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArgentController extends Controller
{
    public function displayArgent(){
        $argent = Argent::with('Commande')->with('User')->get();

        return $argent;
    }

    public function casproPayed(Request $request){
        $argent = Argent::find($request->id);

        $argent->update([
            'soldeMarque' => 1
        ]);
    }

    public function casproNotPayed(Request $request){
        $argent = Argent::find($request->id);

        $argent->update([
            'soldeMarque' => 0
        ]);
    }

    public function commercialPayed(Request $request){
        $argent = Argent::find($request->id);

        $argent->update([
            'soldeCommercial' => 1
        ]);
    }

    public function commercialNotPayed(Request $request){
        $argent = Argent::find($request->id);

        $argent->update([
            'soldeCommercial' => 0
        ]);
    }

    public function displaySalaireCommercial(Request $request){
        $salaire = db::select('SELECT SUM(argents.salaireCommercial) AS Salaire FROM commandes JOIN argents ON commandes.id = argents.commande_id WHERE commandes.user_id = ? AND argents.soldeCommercial = 0;', [$request->user_id]);
        return $salaire;
    }
}
