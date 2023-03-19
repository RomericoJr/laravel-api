<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\marca;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //

    public function getProductMore()
    {
        $products = Product::where('estado', "=", '1')
                    ->addSelect(
            [
                'marca'=> marca::select('Type_marca')
                ->whereColumn('marca_id','id' )
            ]
        )->addSelect(
            [
                'categoria'=> categoria::select('Type_categoria')
                ->whereColumn('categoria_id','id' )
            ]
        )->get();

        return response()->json($products, 200);
    }

    public function getProductMoreById($id)
    {
        $product = Product::find($id)->addSelect(
            [
                'marca'=> marca::select('Type_marca')
                ->whereColumn('marca_id','id')
            ]
        )->addSelect(
            [
                'categoria'=> categoria::select('Type_categoria')
                ->whereColumn('categoria_id','id' )
            ]
        )->get();

        // if($product){
        //     return response()->json(['message' => 'Producto si llega'],200);
        // }

        if(is_null($product)){
            return response()->json(['message' => 'Contenido no encontrado'],404);
        }

        return response()->json($product, 200);
    }


    public function addProduct(Request $request){
        $product = Product::create($request->all());
        return response($product,201);
    }

    public function getProduct(){
        return response()->json(Product::all(),200);
    }

    public function getProductId($id){
        $products = Product::find($id);

        if(is_null($products)){

            return response()->json(['mensaje'=> 'Producto no encontrado'], 404);
        }

        return response()->json([$products, 200]);
    }

    public function deleteProduct(Request $request, $id)
    {
        $products = Product::find($id);
        if(is_null($products)){
            return response()->json(['mensaje'=> 'Producto no encontrado'], 404);
        }
        $products->delete();
        return response()->json(null, 204);
    }



    public function updateProduct(Request $request, $id)
    {
        $products = Product::find($id);
        if(is_null($products)){
            return response()->json(['mensaje'=> 'Producto no encontrado'], 404);
        }
        $products->update($request->all());
        return response($products, 200);
    }

}
