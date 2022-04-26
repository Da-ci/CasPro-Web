<?php

namespace App\Http\Controllers;

use App\Http\Requests\attachProductCommandes;
use App\Http\Requests\createCommandes;
use App\Http\Requests\deleteCommandes;
use App\Http\Requests\displayCommandes;
use App\Http\Requests\displayCommandesMarque;
use App\Http\Requests\displayInfoCommandeMarque;
use App\Http\Requests\infoCommande;
use App\Models\Argent;
use App\Models\Commande;
use App\Models\Livreur;
use App\Models\Notification;
use App\Models\pdv;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class commandeController extends Controller
{
    public function displayCommandes(){

        $Invoices = Commande::with('User')->with('Pdv')->get();
        return $Invoices;
    }

    public function displayCommandesCommercial(Request $request){

        $Invoices = Commande::all()->where('user_id', $request->user_id);
        return $Invoices;
    }

    public function displayCommandesEnAttente(){
        $Invoices = Commande::all()->where('status' , 'En Attente');
        return ['commandes' => $Invoices->count()];
    }

    public function displayCommandesEnAttenteMarques(Request $request){
        $Invoices = db::select('SELECT DISTINCT commandes.id FROM commandes JOIN commande_product ON commandes.id = commande_product.commande_id JOIN products ON products.id = commande_product.product_id WHERE products.user_id = ? AND commandes.status = "En Attente";', [$request->user_id]);
        return ['commandes' => count($Invoices)];
    }

        public function displayEarningsDaily(){
        $Invoices = db::select('SELECT SUM(prixTotal) AS Earnings FROM commandes WHERE date(created_at) = CURDATE() AND status = "Livrée"');
        return $Invoices;
    }

    public function displayEarningsDailyMarques(Request $request){
        $Invoices = db::select('SELECT DISTINCT SUM(commande_product.price) AS Earnings FROM commandes JOIN commande_product ON commandes.id = commande_product.commande_id JOIN products ON products.id = commande_product.product_id WHERE products.user_id = ? AND commandes.status = "Livrée" AND date(commandes.created_at) = CURDATE() AND commande_product.status = 1;', [$request->user_id]);
        return $Invoices;
    }

    public function displayEarningsMonthly(){
        $Invoices = db::select('SELECT SUM(prixTotal) AS Earnings FROM commandes WHERE MONTH(created_at) = MONTH(CURDATE()) AND status = "Livrée";');
        return $Invoices;
    }

    public function displayEarningsMonthlyMarques(Request $request){
        $Invoices = db::select('SELECT DISTINCT SUM(commande_product.price) AS Earnings FROM commandes JOIN commande_product ON commandes.id = commande_product.commande_id JOIN products ON products.id = commande_product.product_id WHERE products.user_id = ? AND commandes.status = "Livrée" AND MONTH(commandes.created_at) = MONTH(CURDATE()) AND commande_product.status = 1;', [$request->user_id]);
        return $Invoices;
    }

    public function overviewEarnings(){
        $Invoices = db::select('SELECT date_format(created_at,"%M") AS Month, SUM(prixTotal) AS Earnings FROM commandes GROUP BY MONTH(created_at);');
        return $Invoices;
    }

    public function overviewEarningsMarques(Request $request){
        $Invoices = db::select('SELECT date_format(commandes.created_at,"%M") AS Month, SUM(commande_product.price) AS Earnings FROM commandes JOIN commande_product ON commandes.id = commande_product.commande_id JOIN products ON products.id = commande_product.product_id WHERE products.user_id = ? AND commandes.status = "Livrée" AND commande_product.status = 1 GROUP BY MONTH(commandes.created_at);', [$request->user_id]);
        return $Invoices;
    }

    public function displayPercentageTasks(){
        $Invoices = db::select('SELECT * FROM commandes WHERE DATE(created_at) = CURDATE();');
        $AcceptedInvoices = db::select('SELECT * FROM commandes WHERE DATE(created_at) = CURDATE() AND (status = "Validée" OR status = "Non Validée" OR status = "Livrée");');

        if(count($Invoices) != 0) {
            return ['Pourcentage' => (count($AcceptedInvoices) * 100) / count($Invoices),
                'Tasks' => count($Invoices)
            ];
        }else{
            return ['Pourcentage' => null,
                'Tasks' => null
            ];
        }
    }

    public function displayNumberProductsMarques(Request $request){
        $Products = Product::all()->where('user_id', $request->user_id);
        return ['Products' => $Products->count()];
    }

    public function displayCommandesMarque(displayCommandesMarque $request){

        $validated = $request->validated();

        $results = db::select("SELECT DISTINCT commandes.id, commandes.numCommande, commandes.status, commandes.created_at FROM commandes JOIN commande_product ON commandes.id = commande_product.commande_id JOIN products ON products.id = commande_product.product_id WHERE products.user_id = ?;", [$request->id]);

        return $results;
    }

    public function displayCommandesMarqueLivreur(Request $request){

        $livreur = Livreur::find($request->id);

        $results = db::select("SELECT DISTINCT commandes.id, commandes.numCommande, commandes.status, commandes.created_at FROM commandes JOIN commande_product ON commandes.id = commande_product.commande_id JOIN products ON products.id = commande_product.product_id WHERE products.user_id = ? AND commande_product.livreur_id = ? AND commandes.status = 'Validée';", [$livreur->user_id, $request->id]);

        return $results;
    }

    public function displayInfoCommandeMarque(displayInfoCommandeMarque $request){

        $validated = $request->validated();

        $commande = Commande::find($request->id);

        $commandeproducts = db::select("SELECT DISTINCT products.id, products.name, commande_product.quantity, (commande_product.quantity*products.quantity) AS realQuantity, commande_product.price, commande_product.status FROM commandes JOIN commande_product ON commandes.id = commande_product.commande_id JOIN products ON products.id = commande_product.product_id WHERE products.user_id = ? AND commandes.id = ?;", [$request->user_id, $request->id]);

        return response()->json(['Commande' => $commande, 'Products' => $commandeproducts ]);
    }

    public function infoCommande(infoCommande $request){

        $validated = $request->validated();

        $commande = Commande::find($request->id);
        $commandeUser = Commande::find($request->id)->user;
        $commandePdv = Commande::find($request->id)->pdv;
        $commandeProduct = Commande::find($request->id)->Product()->get();

        return response()->json(['Commande' => $commande, 'User' => $commandeUser, 'Pdv' => $commandePdv, 'Products' => $commandeProduct ]);
    }

    public function createCommandes(createCommandes $request){

        $validated = $request->validated();

        $uuidString = (string) Str::orderedUuid();

        $commande = Commande::create([
            'numCommande' => 'CM' . '#' . $uuidString,
            'status' => 'En Attente',
            'user_id' => $request->user_id,
            'pdv_id' => $request->pdv_id
        ]);

        return ["id" => $commande->id];
    }

    public function updateCommandes(Request $request){

        // $validated = $request->validated();

        $lastCommande = Commande::orderBy('created_at', 'desc')->first();

        $numCommande = $lastCommande->numCommande;

        $lastCommande->delete();

        $commande = Commande::create([
            'numCommande' => $numCommande,
            'status' => 'En Attente',
            'user_id' => $request->user_id,
            'pdv_id' => $request->pdv_id
        ]);

        return ["id" => $commande->id];
    }

    public function attachProductCommandes(attachProductCommandes $request){

        // $validated = $request->validated();

        $commande = Commande::find($request->id);
        $produit = Product::find($request->product_id);

        $prixNormal = $request->quantity * $produit->quantity * $produit->price;
        $prixGros = $request->quantity * $produit->quantity * $produit->prixGros;

        if($commande->Product()->get()->contains($request->product_id)){
            return ['message' => 'Already Exists'];
        }else{
            if($request->quantity < $produit->seuil) {
                $commande->Product()->attach($request->product_id, ['quantity' => $request->quantity, 'price' => $prixNormal]);
            }else{
                $commande->Product()->attach($request->product_id, ['quantity' => $request->quantity, 'price' => $prixGros]);
            }
        }

        $notification = Notification::where('commande_id', '=', $commande->id, 'AND')->where('user_id', '=', $produit->user_id)->first();

        if(is_null($notification)){
            Notification::create([
                'type' => 'Nouvelle Commande',
                'data' => $commande,
                'user_id' => $produit->user_id,
                'commande_id' => $commande->id,
            ]);
        }
    }

    public function deleteCommandes(deleteCommandes $request){

        $validated = $request->validated();

        $commande = Commande::find($request->id);
        $commande->delete();

    }

    public function displayAvailableStocks(Request $request){

        // $validated = $request->validated();

        $AStocks = db::select("SELECT stocks.id, stocks.name, stocks.localisation FROM stocks JOIN product_stock ON stocks.id = product_stock.stock_id WHERE product_stock.product_id = ? AND product_stock.Quantity >= ?;", [$request->product_id, $request->quantity]);

        return $AStocks;

    }

    public function checkStatusCommandeMarque(Request $request){

        // $validated = $request->validated();

        $commande = Commande::find($request->commande_id);

        $status = db::select("SELECT DISTINCT commande_product.status FROM commandes JOIN commande_product ON commandes.id = commande_product.commande_id JOIN products ON products.id = commande_product.product_id WHERE products.user_id = ? AND commandes.id = ?;", [$request->user_id, $request->commande_id]);
        $null = false;

        foreach($status as $s){
            if(is_null($s->status)){
                $null = true;
            }
        }
        if($null == true){
            return ['status' => 'En Attente'];
        }else{
            $validated = db::select("SELECT SUM(commande_product.status) AS status FROM commandes JOIN commande_product ON commandes.id = commande_product.commande_id JOIN products ON products.id = commande_product.product_id WHERE products.user_id = ? AND commandes.id = ?;", [$request->user_id, $request->commande_id]);

            if($validated[0]->status > 0 && $commande->status == 'Livrée'){
                return ['status' => 'Livrée'];
            }else if($validated[0]->status > 0){
                return ['status' => 'Validée'];
            }else{
                return ['status' => 'Refusée'];
            }
        }


    }

    public function validerCommande(Request $request){

        // $validated = $request->validated();


        db::select("UPDATE commande_product SET status = 1, livreur_id = ? WHERE commande_product.commande_id = ? AND commande_product.product_id = ?;", [$request->livreur_id, $request->commande_id, $request->product_id]);
        db::select("UPDATE product_stock SET Quantity = Quantity - ? WHERE product_stock.product_id = ? AND product_stock.stock_id = ?;", [$request->quantity, $request->product_id, $request->stock_id]);
        db::select("UPDATE commandes SET commandes.prixTotal = commandes.prixTotal + (SELECT commande_product.price FROM commande_product WHERE commande_product.commande_id = ? AND commande_product.product_id = ? AND commande_product.status = 1) WHERE commandes.id = ?;", [$request->commande_id, $request->product_id, $request->commande_id]);

        $checkCommande = db::select('SELECT status FROM commande_product WHERE commande_product.commande_id = ? AND commande_product.status IS NULL;', [$request->commande_id]);

        $result = count($checkCommande);

        if($result == 0){
            $checkCommandeStatus = db::select('SELECT DISTINCT status FROM commande_product WHERE commande_product.commande_id = ?;', [$request->commande_id]);
            $resultValidation = count($checkCommandeStatus);
            if($resultValidation == 1 && $checkCommandeStatus[0]->status == 0){
                db::select('UPDATE commandes SET status = "Non Validée" WHERE commandes.id = ?;', [$request->commande_id]);
            }else{
                db::select('UPDATE commandes SET status = "Validée" WHERE commandes.id = ?;', [$request->commande_id]);
            }
        }

    }

    public function refuserCommande(Request $request){

        // $validated = $request->validated();

        db::select("UPDATE commande_product SET status = 0 WHERE commande_product.commande_id = ? AND commande_product.product_id = ?;", [$request->commande_id, $request->product_id]);

        $checkCommande = db::select('SELECT status FROM commande_product WHERE commande_product.commande_id = ? AND commande_product.status IS NULL;', [$request->commande_id]);

        $result = count($checkCommande);

        if($result == 0){
            $checkCommandeStatus = db::select('SELECT DISTINCT status FROM commande_product WHERE commande_product.commande_id = ?;', [$request->commande_id]);
            $resultValidation = count($checkCommandeStatus);
            if($resultValidation == 1 && $checkCommandeStatus[0]->status == 0){
                db::select('UPDATE commandes SET status = "Non Validée" WHERE commandes.id = ?;', [$request->commande_id]);
            }else{
                db::select('UPDATE commandes SET status = "Validée" WHERE commandes.id = ?;', [$request->commande_id]);
            }
        }

    }

    public function displayInfoCommandeMarqueAdmin(Request $request){

        // $validated = $request->validated();

        $getIdMarques = db::select('SELECT DISTINCT products.user_id FROM commandes JOIN commande_product ON commandes.id = commande_product.commande_id JOIN products ON products.id = commande_product.product_id WHERE commandes.id = ?;', [$request->commande_id]);
        $marquesID = [];
        $marquesProducts = [];

        foreach($getIdMarques as $idMarque){
            array_push($marquesID, $idMarque->user_id);
        }

        foreach ($marquesID as $id) {
            $query = db::select("SELECT DISTINCT users.id AS brand_id, users.name AS brand_name, products.id, products.name, commande_product.quantity, (commande_product.quantity*products.quantity) AS realQuantity, commande_product.price, commande_product.status FROM commandes JOIN commande_product ON commandes.id = commande_product.commande_id JOIN products ON products.id = commande_product.product_id JOIN users ON users.id = products.user_id WHERE products.user_id = ? AND commandes.id = ?;", [$id, $request->commande_id]);
            array_push($marquesProducts, $query);
        }

       return $marquesProducts;
    }

    public function Delivered(Request $request){

        // $validated = $request->validated();

        $commande = Commande::find($request->commande_id);
        $pdv = pdv::find($commande->pdv_id);

        $getIdMarques = db::select('SELECT DISTINCT products.user_id FROM commandes JOIN commande_product ON commandes.id = commande_product.commande_id JOIN products ON products.id = commande_product.product_id WHERE commandes.id = ? AND commande_product.status = 1;', [$request->commande_id]);
        $marquesID = [];

        foreach($getIdMarques as $idMarque){
            array_push($marquesID, $idMarque->user_id);
        }

        foreach ($marquesID as $id) {
            $query = db::select("SELECT ((SUM(commande_product.price) * users.pourcentageCaspro) / 100 ) AS salaireCaspro, ( SUM(commande_product.price) - ( ROUND((SUM(commande_product.price) * users.pourcentageCaspro) / 100)) ) AS salaireMarque, (ROUND(((SUM(commande_product.price) * users.pourcentageCaspro) / 100) / 3, 1) ) AS salaireCommercial FROM commandes JOIN commande_product ON commandes.id = commande_product.commande_id JOIN products ON products.id = commande_product.product_id JOIN users ON users.id = products.user_id WHERE commandes.id = ? AND users.id = ? AND commande_product.status = 1;", [$request->commande_id, $id]);

            $salaire = Argent::create([
                'salaireMarque' => $query[0]->salaireMarque,
                'salaireCaspro' => $query[0]->salaireCaspro,
                'salaireCommercial' => $query[0]->salaireCommercial,
                'commande_id' => $request->commande_id,
                'user_id' => $id
            ]);

        }

        $commande->update([
            'status' => 'Livrée'
        ]);

        $pdv->update([
            'ndce' => $pdv->ndce + 1
        ]);

    }

}
