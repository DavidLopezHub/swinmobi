<?php

namespace App\Http\Controllers;

use App\Models\Zona;
use Illuminate\Http\Request;

class ZonaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $zonas = Zona::all();
        return view('zonas.index', compact('zonas'));
    }
    public function create()
    {
        return view('zonas.create');
    }
    public function store(Request $request)
    {

        $rules = [
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'El nombre de la zona es obligatorio',
            'name.min' => 'El nombre de la zona debe tener al menos 3 caracteres',
        ];

        $this->validate($request, $rules, $messages);

        $zona = new Zona();
        $zona->name = $request->input('name');
        $zona->description = $request->input('description');
        $zona->save();

        $notification='La zona se ha creado correctamente';

        return redirect('/zonas')->with(compact('notification'));
    }

    public function edit(Zona $zona)
    {
        // dd($zona);
        return view('zonas.edit', compact('zona'));
    }

    public function update(Request $request, Zona $zona)
    {

        $rules = [
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'El nombre de la zona es obligatorio',
            'name.min' => 'El nombre de la zona debe tener al menos 3 caracteres',
        ];

        $this->validate($request, $rules, $messages);

        $zona->name= $request->input('name');
        $zona->description= $request->input('description');
        // dd($zona);
        $zona->save();

        $notification='La zona se ha actualizado correctamente';


        return redirect('/zonas')->with(compact('notification'));
    }

    public function destroy(Zona $zona){
        // dd($zona);
        $zona->delete();
        $notification='La zona se ha eliminado correctamente';

        return redirect('/zonas')->with(compact('notification'));
    }
}
