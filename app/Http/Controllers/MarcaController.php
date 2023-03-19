<?php

namespace App\Http\Controllers;

use App\Models\marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    //

    public function addMarca(Request $request){
        $marca = marca::create($request->all());
        return response($marca,201);
    }

    public function getMarca(){
        return response()->json(marca::all(),200);
    }

    public function getMarcaId($id){
        $marcas = marca::find($id);

        if(is_null($marcas)){
            return response()->json(['mensaje'=> 'Marca no encontrada'], 404);
        }
        return response()->json([$marcas, 200]);
    }

    public function deleteMarca(Request $request, $id)
    {
        $marcas = marca::find($id);
        if(is_null($marcas)){
            return response()->json(['mensaje'=> 'Marca no encontrada'], 404);
        }
        $marcas->delete();
        return response()->json(null, 204);
    }

    public function updateMarca(Request $request, $id)
    {
        $marcas = marca::find($id);
        if(is_null($marcas)){
            return response()->json(['mensaje'=> 'Marca no encontrada'], 404);
        }
        $marcas->update($request->all());
        return response($marcas, 200);
    }


}
