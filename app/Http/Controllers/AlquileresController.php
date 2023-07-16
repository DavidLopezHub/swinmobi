<?php

namespace App\Http\Controllers;

use App\Models\Inmueble;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Http\Request;

class AlquileresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::findOrFail(auth()->user()->id);
        $alquileres = $user->inmuebles->flatMap->reservas;
        // dd($alquileres);

        return view('alquileres.index')->with(compact('alquileres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function habilitar(Request $request, string $id){
        $inmueble=Inmueble::where('id','=',$id)->first();

        if ($request->has('estado')) {
            $inmueble->estado_cerradura="Habilitado";
        }else {
            $inmueble->estado_cerradura="Desabilitado";
        }
        $inmueble->save();
        return redirect('/alquileres/lista');
    }
}
