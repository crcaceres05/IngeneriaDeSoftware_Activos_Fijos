<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;

class RolController extends Controller
{
    public function index(){
        $roles = Rol::all();

        return response()->json([
            "rol"=>$roles
        ],200);
    }

    public function show($id){
        $rol = Rol::find($id);

        return response()->json([
            "rol"=>$rol
        ],200);

    }

    public function store(Request $request){
        $rol = new Rol;

        $rol->descripcion = $request->descripcion;

        $rol->save();

        return response()->json([
            "rol"=>"Creado exitosamente"
        ],201);
    }

    public function update($id, Request $request){
        Rol::where('id', $id)
            ->update(['descripcion' => $request->descripcion]);

            return response()->json([
                "rol"=>"Actualizado correctamente"
            ],200);
    }

    public function destroy($id){
        Rol::destroy($id);
    }
}
