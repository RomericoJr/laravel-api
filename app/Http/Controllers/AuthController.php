<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    //

    public function login(Request $request)
    {
        if(!Auth::attempt($request->only('email', 'password')))
        {
            return response()
                ->json(['message'=>'Unauthorized'],401);
        }

        $user = User::where('email', $request['email'])
                ->addSelect(
                    [
                        'rol' =>Role::select('name')
                        ->whereColumn('rol_id','id')
                    ]
                )
                ->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;
        $cookie = cookie('cookie_token', $token,60 *24);

        return response()
            ->json([
                'message'=>'Hi',
                'name' => $user->name,
                'access_token' => $token,
                'typeToken' => 'Bearer',
                'user' => $user
            ])->withoutCookie($cookie);
    }
    // {
    //     $valid = Validator::make($request, [
    //         'email' => 'required| max:255',
    //         'password' => 'required| min:6'
    //     ]);

    //     if($valid->fails()){
    //         return response()->json([
    //             'errors'=>$valid->errors()],422);
    //     }

    //     $login = $request->only('email', 'password');

    //     if(!Auth::attempt($login)){
    //         return response(['message' => 'Invalid login credential!!',401]);
    //     }
    //             /**
    //      * @var User $user
    //      */
    //     $user = Auth::user();
    //     $token = $user->createToken($user->name);

    //     return response([
    //         'id'=> $user->id,
    //         'name'=> $user->name,
    //         'email'=> $user->email,
    //         'created_at' => $user->created_at,
    //         'updated_at' => $user->updated_at,
    //         'token' => $token->accessToken,
    //     ],200);
    // }



    public function logout(Request $request)
    {
        $cookie = Cookie::forget('cookie_token');

        $request->user()->tokens()->delete();

        return response()->json([
            'message'=> 'Logout success'
        ],201);
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

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user'=>$user,
            'access_token'=>$token,
            'token_type' => 'Bearer'
        ],201);
    }

    public function userProfile()
    {
        return response()->json([
            "message" => "userProfile OK",
            "userData" => auth()->user()
        ], 201);
    }
}
