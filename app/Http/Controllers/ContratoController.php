<?php

namespace App\Http\Controllers;

use App\Models\Inmueble;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ContratoController extends Controller
{

    public function contract(Inmueble $inmueble)
    {
        // dd($inmueble->tipoInmueble()->first()->name);
        if ($inmueble->tipo_inmueble_id==1) {
            return view('contratos.contract')->with(compact('inmueble'));

        } else {
            return view('contratos.contratoalquiler')->with(compact('inmueble'));

        }

    }
    public function registerContract(Request $request)
    {
        // dd($request->input("inmueble_id")[0]);
        // dd($request);
        $rules = [
            'ocupantes_adultos' => 'required',
            'ocupantes_menores' => 'required',
            'date_ini' => 'required',
            'date_fin' => 'required',
            'pago_total' => 'required',
        ];

        $messages = [
            'ocupantes_adultos.required' => 'Numero de ocupantes adultos requeridos',
            'ocupantes_menores.required' => 'Numero de ocupantes menores requeridos',
            'date_ini.required' => 'Fecha inicial requerida',
            'date_fin.required' => 'Fecha final requerida',
            'pago_total.required' => 'Monto del pago total requerido',
        ];

        $this->validate($request, $rules, $messages);

        $inmueble = Inmueble::find($request->input('inmueble_id'))->first();
        // dd($inmueble);
        $inmueble->estado_inmueble= "Desabilitado";
        $inmueble->save();
        $reserva= new Reserva();
        $reserva->fecha_inicio= $request->input("date_ini");
        $reserva->fecha_fin= $request->input("date_fin");
        $reserva->ocupantes_adultos= $request->input("ocupantes_adultos");
        $reserva->ocupantes_menores= $request->input("ocupantes_menores");
        $reserva->total= $request->input("pago_total");
        $reserva->user_id= auth()->user()->id;
        $reserva->save();
        $reserva->inmuebles()->attach($request->input('inmueble_id'));
        // dd($reserva);

        $notification='El contrato de Reserva del inmueble se ha creado correctamente';

        return redirect('/inmuebles')->with(compact('notification'));
    }

}
