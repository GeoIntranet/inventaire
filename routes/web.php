<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    dump($_SERVER);
    //return redirect('/inventaire');
    $excel = Importer::make('Excel');
    $excel->load('ref.xlsx');
    $collection = $excel->getCollection();
    dump($collection);

    return view('welcome');
});

Route::middleware(['registredIP'])->group(function () {
    Route::get('/inventaire','InventaireController@index');
    Route::post('/inventaire','InventaireController@store');
    Route::post('/inventaire/mode','InventaireController@mode');
    Route::post('/inventaire/pause','InventaireController@etat');
    Route::post('/inventaire/annulation','InventaireController@annulation');
});
