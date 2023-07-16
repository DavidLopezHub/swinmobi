<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Inmueble;
// use App\Models\Reserva;
use Carbon\Carbon;
// use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function consultar(string $var){ //"verificar_estado=1"

        $palabras= explode("=",$var);
        $accion=$palabras[0]; //"verificar_estado" -- "modificar_estado="
        $codigo=$palabras[1]; //"1"
        // dd($palabras);
        $fechaActual=Carbon::now();
        $inmueble=Inmueble::where('codigo_cerradura','=',$codigo)->first();
        // dd(auth()->user());
        if ($inmueble==null) {
            return "No se ha encontrado el contrato";
        }
        $reserva=$inmueble->reservas()->first();
        // dd($fechaActual->subDays(5));
        if ($reserva->fecha_fin<$fechaActual->subDays(5)) {
            $reserva->estado=false;
            $reserva->save();
            return "Cerrar_cerradura";
        }
        if (($accion=="verificar_estado") && ($inmueble->estado_cerradura=="Desabilitado")) {
            return "Cerrar_cerradura";
        }
        if ($accion=="modificar_estado") {
            $inmueble->estado_cerradura="Desabilitado";
            $inmueble->save();
            return "Cerrar_cerradura";
        }
        return "Abrir_cerradura";
    }
}
