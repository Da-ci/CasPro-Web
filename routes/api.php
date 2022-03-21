<?php

use App\Http\Controllers\commandeController;
use App\Http\Controllers\LivreurController;
use App\Http\Controllers\PdvController;
use App\Http\Controllers\StockController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// User routes

Route::post('login', [UserController::class,'login']);
Route::post('createUser', [UserController::class,'createUser']);
Route::post('updateUser', [UserController::class, 'updateUser']);
Route::post('updateOneUser', [UserController::class, 'updateOneUser']);
Route::post('deleteUser', [UserController::class, 'deleteUser']);
Route::post('displayUser', [UserController::class,'displayUser']);
Route::get('displayBrands', [UserController::class,'displayBrands']);
Route::get('displayAllUsers', [UserController::class, 'displayAllUsers']);
Route::get('displayAllUsersASC', [UserController::class, 'displayAllUsersASC']);
Route::get('displayAllUsersDESC', [UserController::class, 'displayAllUsersDESC']);

// Product routes

Route::post('displayProducts', [ProductController::class,'displayProducts']);
Route::post('displayAvailableProducts', [ProductController::class,'displayAvailableProducts']);
Route::post('checkMaxQuantity', [ProductController::class,'checkMaxQuantity']);
Route::post('createProducts', [ProductController::class,'createProducts']);
Route::post('updateProducts', [ProductController::class,'updateProducts']);
Route::post('deleteProducts', [ProductController::class,'deleteProducts']);

// Stock routes

Route::post('displayStocks', [StockController::class,'displayStocks']);
Route::post('displayStocksProducts', [StockController::class,'displayStocksProducts']);
Route::post('createStock', [StockController::class,'createStock']);
Route::post('updateStock', [StockController::class,'updateStock']);
Route::post('deleteStock', [StockController::class,'deleteStock']);
Route::post('addProductStocks', [StockController::class,'addProductStocks']);
Route::post('deleteProductsFromStock', [StockController::class,'deleteProductsFromStock']);
Route::post('updateProductsFromStock', [StockController::class,'updateProductsFromStock']);
Route::post('transferProducts', [StockController::class,'transferProducts']);

//Livreurs routes

Route::post('displayLivreur', [LivreurController::class,'displayLivreur']);
Route::post('createLivreur', [LivreurController::class,'createLivreur']);
Route::post('deleteLivreur', [LivreurController::class,'deleteLivreur']);
Route::post('updateLivreur', [LivreurController::class,'updateLivreur']);

//Commandes routes

Route::get('displayCommandes', [commandeController::class,'displayCommandes']);
Route::post('createCommandes', [commandeController::class,'createCommandes']);
Route::post('attachProductCommandes', [commandeController::class,'attachProductCommandes']);
Route::post('deleteCommandes', [commandeController::class,'deleteCommandes']);

//Pdv routes

Route::get('displayPdv', [PdvController::class,'displayPdv']);
Route::post('createPdv', [PdvController::class,'createPdv']);
Route::post('updatePdv', [PdvController::class,'updatePdv']);
Route::post('deletePdv', [PdvController::class,'deletePdv']);




