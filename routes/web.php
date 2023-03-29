<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Product;   

Route::middleware('auth')->group(function(){
    Route::get('/', function (){
        return redirect()->route('products.index');
    });

    Route::get('/products', function(){
    $products = Product::orderBy('created_at', 'desc')->get();

    return view('products.index', compact('products'));
})->name('products.index');

Route::get('/products/create', function(){
    return view('products.create');
})->name('products.create');


Route::post('/products', function(Request $req){
    
    //print($req->input);
    $newProduct = new Product;
    $newProduct->description =  $req->input('description');
    $newProduct->price =        $req->input('price'); 
    $newProduct->save();
    //return view('products.index');
    return redirect()->route('products.index')->with('info', 'Producto creado exitosamente!');


})->name('products.store');

Route::delete('products/{id}', function($id) {
    $product = Product::findOrFail($id);
    $product->delete();
    return redirect()->route('products.index')->with('info', 'Producto eliminado exitosamente');
})->name('products.destroy');


Route::get('products/{id}/edit', function($id){
    $product = Product::findOrFail($id);
    return view('products.edit', compact('product'));
})->name('products.edit');

Route::put('products/{id}', function(Request $req, $id){
    $product = Product::findOrFail($id);
    $product->description= $req->input('description');
    $product->price= $req->input('price');
    $product->save();
    return redirect()->route('products.index')->with('info', 'Producto actualizado exitosamente!');
})->name('products.update');
    
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');