<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

});

// Display List of Listings
Route::get('/', [ListingController::class, 'index']);


//Display Create Form
Route::get('/listings/create',[ListingController::class, 'create']);

//Store List 
Route::get('/listings/store',[ListingController::class, 'store']);

//Display single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);
Route::get('/search', function(Request $request){
    return response($request['name']);
});