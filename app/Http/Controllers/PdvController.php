<?php

namespace App\Http\Controllers;

use App\Http\Requests\createPdv;
use App\Http\Requests\deletePdv;
use App\Http\Requests\updatePdv;
use App\Models\pdv;
use Illuminate\Http\Request;

class PdvController extends Controller
{
    public function displayPdv(){

        $pdvs = pdv::all();
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
