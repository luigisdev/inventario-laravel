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
    @Author: Luis Alberto García Rodríguez
*/

use Illuminate\Http\Request;
use App\Product;

Route::get('/', function () {
    return view('welcome');
});

Route::get('products', function (){
    return view('products.index');
})->name('products.index');

Route::get('products/create', function (){
    return view('products.create');
})->name('products.create');

Route::post('products' , function(Request $request){
    // return 'Guardando productos...';
    // return $request->all();
    $new_product = new Product;

    $new_product->description = $request->input('descripcion');
    $new_product->price = $request->input('precio');

    $new_product->save();

    return redirect()->route('products.index');
})->name('products.store');
