<?php

namespace App\Http\Controllers;

use App\Models\TipoUsuario;
use Illuminate\Http\Request;

class TipoUsuarioController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $tipo_usuarios = TipoUsuario::all();
        return view('tipousuario.index', compact('tipo_usuarios'));
    }
    public function create()
    {
        return view('tipousuario.create');
    }
    public function sendData(Request $request)
    {

        $rules = [
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'El nombre del tipo usuario es obligatorio',
            'name.min' => 'El nombre del tipo usuario debe tener al menos 3 caracteres',
        ];

        $this->validate($request, $rules, $messages);

        $tipo_usuario = new TipoUsuario();
        $tipo_usuario->name = $request->input('name');
        $tipo_usuario->description = $request->input('description');
        $tipo_usuario->save();

        $notification='El tipo de usuario se ha creado correctamente';

        return redirect('/tipo_usuario')->with(compact('notification'));
    }

    public function edit(TipoUsuario $tipo_usuario)
    {
        // dd($tipo_usuario);
        return view('tipousuario.edit', compact('tipo_usuario'));
    }

    public function update(Request $request, TipoUsuario $tipo_usuario)
    {

        $rules = [
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'El nombre del tipo usuario es obligatorio',
            'name.min' => 'El nombre del tipo usuario debe tener al menos 3 caracteres',
        ];

        $this->validate($request, $rules, $messages);

        $tipo_usuario->name= $request->input('name');
        $tipo_usuario->description= $request->input('description');
        // dd($tipo_usuario);
        $tipo_usuario->save();

        $notification='El tipo de usuario se ha actualizado correctamente';


        return redirect('/tipo_usuario')->with(compact('notification'));
    }

    public function destroy(TipoUsuario $tipo_usuario){
        // dd($tipo_usuario);
        $tipo_usuario->delete();
        $notification='El tipo de usuario se ha eliminado correctamente';

        return redirect('/tipo_usuario')->with(compact('notification'));
    }
}
