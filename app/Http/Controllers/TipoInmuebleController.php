<?php

namespace App\Http\Controllers;

use App\Models\TipoInmueble;
use Illuminate\Http\Request;

class TipoInmuebleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $tipo_inmuebles = TipoInmueble::all();
        return view('tipoinmuebles.index', compact('tipo_inmuebles'));
    }
    public function create()
    {
        return view('tipoinmuebles.create');
    }
    public function store(Request $request)
    {

        $rules = [
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'El nombre del tipo de inmueble es obligatorio',
            'name.min' => 'El nombre del tipo de inmueble debe tener al menos 3 caracteres',
        ];

        $this->validate($request, $rules, $messages);

        $tipo_inmueble = new TipoInmueble();
        $tipo_inmueble->name = $request->input('name');
        $tipo_inmueble->description = $request->input('description');
        $tipo_inmueble->save();

        $notification='El tipo de inmueble se ha creado correctamente';

        return redirect('/tipo_inmuebles')->with(compact('notification'));
    }

    public function edit(TipoInmueble $tipo_inmueble)
    {
        // dd($tipo_inmueble);
        return view('tipoinmuebles.edit', compact('tipo_inmueble'));
    }

    public function update(Request $request, TipoInmueble $tipo_inmueble)
    {

        $rules = [
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'El nombre del tipo de inmueble es obligatorio',
            'name.min' => 'El nombre del tipo de inmueble debe tener al menos 3 caracteres',
        ];

        $this->validate($request, $rules, $messages);

        $tipo_inmueble->name= $request->input('name');
        $tipo_inmueble->description= $request->input('description');
        // dd($tipo_inmueble);
        $tipo_inmueble->save();

        $notification='El tipo de inmueble se ha actualizado correctamente';


        return redirect('/tipo_inmuebles')->with(compact('notification'));
    }

    public function destroy(TipoInmueble $tipo_inmueble){
        // dd($tipo_inmueble);
        $tipo_inmueble->delete();
        $notification='El tipo de inmueble se ha eliminado correctamente';

        return redirect('/tipo_inmuebles')->with(compact('notification'));
    }
}
