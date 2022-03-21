<?php

namespace App\Http\Controllers;

use App\Http\Requests\displayCommandes;
use App\Models\Commande;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class commandeController extends Controller
{
    public function displayCommandes(){

        $Invoices = Commande::with('User')->with('Pdv')->get();
        return $Invoices;
    }

    public function createCommandes(Request $request){

        $uuidString = (string) Str::orderedUuid();

        $commande = Commande::create([
            'numCommande' => 'CM' . '#' . $uuidString,
            'status' => 'En Attente',
            'user_id' => $request->user_id,
            'pdv_id' => $request->pdv_id
        ]);
    }

    public function attachProductCommandes(Request $request){

        $commande = Commande::find($request->id);
        $produit = Product::find($request->product_id);

        if($commande->Product()->get()->contains($request->product_id)){
            return ['message' => 'Already Exists'];
        }else{
            $commande->Product()->attach($request->product_id, ['quantity' => $request->quantity, 'price' => $produit->price * $request->quantity]);
        }
    }

    public function deleteCommandes(Request $request){

        $commande = Commande::find($request->id);
        $commande->delete();

    }

}
