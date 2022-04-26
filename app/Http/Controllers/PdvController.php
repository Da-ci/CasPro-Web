<?php

namespace App\Http\Controllers;

use App\Http\Requests\createPdv;
use App\Http\Requests\deletePdv;
use App\Http\Requests\updatePdv;
use App\Models\pdv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PdvController extends Controller
{
    public function displayPdv(){

        $pdvs = pdv::all();
        return $pdvs;

    }

    public function displayPdvPieChart(){

        $pdvs = db::select('SELECT * FROM pdvs WHERE ndce > 0 ORDER BY ndce DESC LIMIT 3;');
        return $pdvs;

    }

    public function displayProductPieChartMarques(Request $request){

        $pdvs = db::select('SELECT products.name, SUM(commande_product.price) AS totalPrice FROM commandes JOIN commande_product ON commandes.id = commande_product.commande_id JOIN products ON products.id = commande_product.product_id WHERE products.user_id = ? AND commandes.status = "Livrée" AND commande_product.status = 1 GROUP BY products.name ORDER BY totalPrice DESC LIMIT 3;', [$request->user_id]);
        return $pdvs;

    }

    public function createPdv(createPdv $request){

        $validated = $request->validated();

        $pdv = pdv::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'wilaya' => $request->wilaya,
            'commune' => $request->commune,
            'adresse' => $request->adresse,
            'ndce' => 0,
            'RC' => $request->RC,
            'NIF' => $request->NIF,
            'NIS' => $request->NIS,
            'AI' => $request->AI
        ]);
    }

    public function updatePdv(updatePdv $request){

        $validated = $request->validated();

        $pdv = pdv::find($request->id);

        $pdv->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'wilaya' => $request->wilaya,
            'commune' => $request->commune,
            'adresse' => $request->adresse,
            'ndce' => $request->ndce,
            'RC' => $request->RC,
            'NIF' => $request->NIF,
            'NIS' => $request->NIS,
            'AI' => $request->AI
        ]);

    }

    public function deletePdv(deletePdv $request){

        $validated = $request->validated();

        $pdv = pdv::find($request->id);

        $pdv->delete();

    }
}
