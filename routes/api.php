<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//obtener producto
Route::get('productos',[ProductController::class, 'getProductMore']);

//crear producto
Route::post('newProduct',[ProductController::class, 'addProduct']);

//obtener producto por id
Route::get('products/{id}',[ProductController::class,'getProductId']);

//actualizar producto
Route::put('updateProducts/{id}',[ProductController::class,'updateProduct']);

//eliminar producto
Route::delete('deleteProducts/{id}',[ProductController::class,'deleteProduct']);


//get product more
Route::get('productsMore',[ProductController::class,'getProductMore']);

// get product more by id
Route::get('productsMore/{id}',[ProductController::class,'getProductMoreById']);


//obtener categoria
Route::get('categorias',[CategoriaController::class, 'getCategoria']);

//crear categoria
Route::post('newCategoria',[CategoriaController::class, 'addCategoria']);

//obtener categoria por id
Route::get('categorias/{id}',[CategoriaController::class,'getCategoriaId']);

//actualizar categoria
Route::put('updateCategorias/{id}',[CategoriaController::class,'updateCategoria']);

//eliminar categoria
Route::delete('deleteCategorias/{id}',[CategoriaController::class,'deleteCategoria']);


//obtener marca
Route::get('marcas',[MarcaController::class, 'getMarca']);

//crear marca
Route::post('newMarca',[MarcaController::class, 'addMarca']);

//obtener marca por id
Route::get('marcas/{id}',[MarcaController::class,'getMarcaId']);

//actualizar marca
Route::put('updateMarcas/{id}',[MarcaController::class,'updateMarca']);

//eliminar marca
Route::delete('deleteMarcas/{id}',[MarcaController::class,'deleteMarca']);


// @Login Ruta para login

Route::post('login', [AuthController::class, 'login']);
Route::post('register',[AuthController::class,'register']);
