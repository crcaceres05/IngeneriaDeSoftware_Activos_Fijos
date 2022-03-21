<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class UsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['signon', 'signin']]);
    }

    public function index()
    {
        $Users = Usuario::all();

        return response()->json([
            "User" => $Users
        ], 200);
    }

    public function show($id)
    {
        $User = Usuario::find($id);

        return response()->json([
            "User" => $User
        ], 200);
    }

    public function update($id, Request $request)
    {
        //actualizacion de password
    }

    public function destroy($id)
    {
        Usuario::destroy($id);
    }

    public function signon(Request $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = Usuario::create($input);

        return response()->json([
            'ok' => true,
            'message' => '¡Usuario registrado exitosamente!',
            'user' => $user,
        ], 201);
    }

    public function signin(Request $request)
    {
        $credentials = request(['codusr', 'password']);


        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'ok' => true,
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
        ]);
    }
}
