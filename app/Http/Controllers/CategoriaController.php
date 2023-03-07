<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    //

    public function addCategoria(Request $request){
        $categoria = categoria::create($request->all());
        return response($categoria,201);
    }

    public function getCategoria(){
        return response()->json(categoria::all(),200);
    }

    public function getCategoriaId($id){
        $categorias = categoria::find($id);

        if(is_null($categorias)){
            return response()->json(['mensaje'=> 'Categoria no encontrada'], 404);
        }
        return response()->json([$categorias, 200]);
    }

    public function deleteCategoria(Request $request, $id)
    {
        $categorias = categoria::find($id);
        if(is_null($categorias)){
            return response()->json(['mensaje'=> 'Categoria no encontrada'], 404);
        }
        $categorias->delete();
        return response()->json(null, 204);
    }

    public function updateCategoria(Request $request, $id)
    {
        $categorias = categoria::find($id);
        if(is_null($categorias)){
            return response()->json(['mensaje'=> 'Categoria no encontrada'], 404);
        }
        $categorias->update($request->all());
        return response($categorias, 200);
    }
}
