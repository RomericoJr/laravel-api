<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //

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
