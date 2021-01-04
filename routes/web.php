<?php

use Illuminate\Support\Facades\Route;

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
    $data = config('site-data');

    $lunghe = [];
    $corte = [];
    $cortissime = [];

    foreach ($data as $key => $card){

        // creiamo la chiave per l'array
        $card['id'] = $key;

        if($card['tipo'] == 'lunga'){
            $lunghe[] = $card;
        }
        elseif ($card['tipo'] == 'corta'){
            $corte[] = $card;
        }
        elseif ($card['tipo'] == 'cortissima'){
            $cortissime[] = $card;
        }
    }

    // return view('welcome', ['lunghe' => $lunghe, 'corte' => $corte, 'cortissime' => $cortissime]);
    return view('welcome', compact('lunghe', 'corte', 'cortissime'));

}) ->name('welcome');

Route::get('/product/{id}', function($id) {
   

    $data = config('site-data');

    $product = $data[$id];
    $length = count($data) -1;


    return view('product', compact('product', 'length', 'id'));
})->name('product');
