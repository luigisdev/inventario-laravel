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
    // Obtiene todos los datos de la tabla products 
    // $productos = Product::all();

    $productos = Product::orderBy('created_at', 'desc')->get();

    return view('products.index', compact('productos'));
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

    // Con el with se manda un mensaje de sessión unico con el texto a mostrar
    return redirect()->route('products.index')->with('info', 'Producto guardado exitosamente...');
})->name('products.store');

Route::delete('products/{id}', function($id){
    // return $id;
    $producto = Product::findOrFail($id);
    // return $producto;
    $producto->delete();
    return redirect()->route('products.index')->with('info', 'Producto eliminado con éxito...');
})->name('products.destroy');