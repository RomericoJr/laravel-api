<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function login()
    {

    }

    public function register( Request $request)
    {
        $valid = Validator::make($request->all(),[
            'name'=> 'required| string|max:255',
            'email' => 'required |string| email| unique:users',
            'password'=>'required |string|min:6',
        ]);

        if($valid->fails()){
            return response()->json([
                'errors'=>$valid->errors()],422);
        }

        $user = User::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);

        return response()->json(['user'=>$user],201);
    }
}
