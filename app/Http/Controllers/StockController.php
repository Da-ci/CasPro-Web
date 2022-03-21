<?php

namespace App\Http\Controllers;

use App\Http\Requests\addProductStocks;
use App\Http\Requests\createStock;
use App\Http\Requests\deleteProductsFromStock;
use App\Http\Requests\deleteStock;
use App\Http\Requests\displayStocks;
use App\Http\Requests\displayStocksProducts;
use App\Http\Requests\transferProducts;
use App\Http\Requests\updateProductsFromStock;
use App\Http\Requests\updateStock;
use App\Models\Product;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public  function  displayStocksProducts(displayStocksProducts $request){

        $products = Stock::find($request->id)->Product()->get();

        return $products;
    }

    public function displayStocks(displayStocks $request){

        $stocks = User::find($request->id)->stocks;

        return $stocks;
    }

    public function createStock(createStock $request){

        $validated = $request->validated();

        $stock = Stock::create([
            'name' => $request->name,
            'localisation' => $request->localisation,
            'user_id' => $request->user_id
        ]);
    }

    public function updateStock(updateStock $request){

        $validated = $request->validated();

        $stock = Stock::find($request->id);

        $stock->update([
            'name' => $request->name,
            'localisation' => $request->localisation,
        ]);
    }

    public function deleteStock(deleteStock $request){

        $validated = $request->validated();

        $stock = Stock::find($request->id);

        $stock->delete();
    }

    public function addProductStocks(addProductStocks $request) {

        $validated = $request->validated();

        $product = Product::find($request->id);

        if($product->Stock()->get()->contains($request->stock_id)){
            return ['message' => 'Already Exists'];
        }else{
            $product->Stock()->attach($request->stock_id, ['quantity' => $request->quantity]);
        }
    }

    public function deleteProductsFromStock(deleteProductsFromStock $request){

        $validated = $request->validated();

        $product = Product::find($request->id);

        $product->Stock()->detach($request->stock_id);

    }

    public function updateProductsFromStock(updateProductsFromStock $request){

        $validated = $request->validated();

        $product = Product::find($request->id);

        $product->Stock()->detach($request->stock_id);
        $product->Stock()->attach([
            $request->stock_id => [
                'quantity' => $request->quantity
            ]
        ]);

    }

    public function transferProducts(transferProducts $request){

        $validated = $request->validated();

        $product = Product::find($request->id);

        if($product->Stock()->get()->contains($request->stock_id)){
            return ['message' => 'Already Exists'];
        }else{
            $product->Stock()->attach([
                $request->stock_id => [
                    'quantity' => $request->quantity
                ]
            ]);
        }
    }
}
