<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Spatie\Permission\Models\Role as ModelsRole;

class roleController extends Controller
{
    public function addRole(Request $request)
    {
        $role = ModelsRole::create($request->all());
        return response($role, 201);
    }

    public function getRole()
    {
        return response()->json(ModelsRole::all(), 200);
    }

    public function getRoleId($id)
    {
        $role = ModelsRole::find($id);

        if (is_null($role)) {
            return response()->json(['mensaje' => 'Role no encontrado'], 404);
        }
        return response()->json([$role, 200]);
    }

    public function deleteRole(Request $request, $id)
    {
        $role = ModelsRole::find($id);
        if (is_null($role)) {
            return response()->json(['mensaje' => 'Role no encontrado'], 404);
        }
        $role->delete();
        return response()->json(null, 204);
    }

    public function updateRole(Request $request, $id)
    {
        $role = ModelsRole::find($id);
        if (is_null($role)) {
            return response()->json(['mensaje' => 'Role no encontrado'], 404);
        }
        $role->update($request->all());
        return response($role, 200);
    }
}
