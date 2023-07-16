<?php

namespace App\Http\Controllers;

use App\Models\Inmueble;
use App\Models\TipoInmueble;
use App\Models\Zona;
use Illuminate\Http\Request;

class InmuebleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inmuebles=Inmueble::where('user_id',auth()->user()->id)->get();
        return view('inmuebles.index',compact('inmuebles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $zonas=Zona::all();
        $tipo_inmuebles=TipoInmueble::all();
        return view('inmuebles.create',compact('zonas','tipo_inmuebles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->input("tipo_inmueble"));
        $rules = [
            'tipo_inmueble'=>'required',
            'titulo'=>'required|min:8',
            'precio' => 'required',
            'servicios' => 'required',
            'superficie' => 'required',
            'img' => 'required|image|max:2048',
        ];

        $messages = [
            'tipo_inmueble.required' => 'Seleccione un tipo de inmueble',
            'titulo.required' => 'El campo titulo es obligatorio',
            'titulo.max' => 'El campo titulo debe tener mas de 8 caracteres',
            'precio.required' => 'El campo precio es obligatorio',
            'servicios.required' => 'El campo servicios es obligatorio',
            'superficie.required' => 'es campo superficie es obligatorio',
            'img.required' => 'Seleccione un archivo en el campo Imagen',
            'img.image' => 'Seleccione un archivo en formato de imagen',
            'img.max' => 'Seleccione una imagen de no mas de 2mb',
        ];

        $this->validate($request, $rules, $messages);

        //TRATAMIENTO DE LA IMAGEN
        //nombre completo mas extension
        $imgNombreMasExtension=$request->file('img')->getClientOriginalName();
        //nombre sin extension
        $imgNombre=pathinfo($imgNombreMasExtension,PATHINFO_FILENAME);
        //obtiene solo la extension
        $imgExtension=$request->file('img')->getClientOriginalExtension();
        //Nombre de la imagen para la base de datos
        $imgNombreDb=$imgNombre.'_'.time().'.'.$imgExtension;

        // dd($request,$imgExtension,$imgNombre);
        // dd($request);
        $inmueble = new Inmueble();
        $inmueble->tipo_inmueble_id = $request->input('tipo_inmueble');
        // dd($request->input('tipo_inmueble'),$inmueble->tipo_inmueble_id);
        $inmueble->titulo = $request->input('titulo');
        $inmueble->precio = $request->input('precio');
        $inmueble->servicios = $request->input('servicios');
        $inmueble->superficie= $request->input('superficie');
        if ($inmueble->tipo_inmueble_id==1) {
            $inmueble->latitud= $request->input('latitud');
            $inmueble->longitud= $request->input('longitud');
        }
        $inmueble->img= $imgNombreDb;
        $inmueble->zona_id= $request->input('zonas')[0];
        $inmueble->user_id= auth()->user()->id;
        $inmueble->estado_inmueble= 'Habilitado';
        if ($inmueble->tipo_inmueble_id==2) {
            $inmueble->nro_habitaciones= $request->input('nro_habitaciones');
            $inmueble->codigo_cerradura= $request->input('codigo_cerradura');
            $inmueble->estado_cerradura= 'Habilitado';
            $inmueble->capacidad_maxima= $request->input('capacidad_maxima');
            $inmueble->nro_habitacion= $request->input('nro_habitacion');
        }
        // dd($inmueble->tipo_inmueble_id,$request);
        //direccion en que se guardará
        $request->file('img')->storeAs('public/img_inmuebles',$imgNombreDb);
        $inmueble->save();

        $notification='El inmueble se ha creado correctamente';

        return redirect('/inmuebles')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Inmueble $inmueble)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inmueble $inmueble)
    {
        $zonas=Zona::all();
        $tipo_inmuebles=TipoInmueble::all();
        // dd($inmueble);
        return view('inmuebles.edit',compact('zonas','tipo_inmuebles','inmueble'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inmueble $inmueble)
    {
        // dd($request,$inmueble);
        $rules = [
            'tipo_inmueble'=>'required',
            'titulo'=>'required|min:8',
            'precio' => 'required',
            'servicios' => 'required',
            'superficie' => 'required',
            // 'img' => 'required|image|max:2048',
        ];

        $messages = [
            'tipo_inmueble.required' => 'Seleccione un tipo de inmueble',
            'titulo.required' => 'El campo titulo es obligatorio',
            'titulo.max' => 'El campo titulo debe tener mas de 8 caracteres',
            'precio.required' => 'El campo precio es obligatorio',
            'servicios.required' => 'El campo servicios es obligatorio',
            'superficie.required' => 'es campo superficie es obligatorio',
            // 'img.required' => 'Seleccione un archivo en el campo Imagen',
            // 'img.image' => 'Seleccione un archivo en formato de imagen',
            // 'img.max' => 'Seleccione una imagen de no mas de 2mb',
        ];

        $this->validate($request, $rules, $messages);

        //TRATAMIENTO DE LA IMAGEN
        if ($request->file('img')) {
            //nombre completo mas extension
            $imgNombreMasExtension=$request->file('img')->getClientOriginalName();
            //nombre sin extension
            $imgNombre=pathinfo($imgNombreMasExtension,PATHINFO_FILENAME);
            //obtiene solo la extension
            $imgExtension=$request->file('img')->getClientOriginalExtension();
            //Nombre de la imagen para la base de datos
            $imgNombreDb=$imgNombre.'_'.time().'.'.$imgExtension;

            //Guardar vieja imagen para eliminarlo
            $oldNameImg=public_path().'/storage/img_inmuebles/'.$inmueble->img;
            $inmueble->img= $imgNombreDb;
        }

        // $inmueble = new Inmueble();
        $inmueble->tipo_inmueble_id = $request->input('tipo_inmueble');
        $inmueble->titulo = $request->input('titulo');
        $inmueble->precio = $request->input('precio');
        $inmueble->servicios = $request->input('servicios');
        $inmueble->superficie= $request->input('superficie');
        if ($inmueble->tipo_inmueble_id==1) {
            $inmueble->latitud= $request->input('latitud');
            $inmueble->longitud= $request->input('longitud');
        }
        // dd($inmueble);
        $inmueble->zona_id= $request->input('zonas')[0];
        // $inmueble->user_id= auth()->user()->id;
        if ($inmueble->tipo_inmueble_id==2) {
            $inmueble->nro_habitaciones= $request->input('nro_habitaciones');
            $inmueble->codigo_cerradura= $request->input('codigo_cerradura');
            // $inmueble->estado_cerradura= $request->input('codigo_cerradura');
            $inmueble->capacidad_maxima= $request->input('capacidad_maxima');
            $inmueble->nro_habitacion= $request->input('nro_habitacion');
        }else {
            $inmueble->nro_habitaciones= null;
            $inmueble->estado_cerradura= null;
            // $inmueble->estado_habitacion= null;
            $inmueble->capacidad_maxima= null;
            $inmueble->nro_habitacion= null;
        }
        // dd($inmueble,$request);
        // dd($imgNombreDb);
        if ($request->file('img')) {
            $request->file('img')->storeAs('public/img_inmuebles',$imgNombreDb);
            if(file_exists($oldNameImg)){
                unlink($oldNameImg);
            }
        }
        $inmueble->save();
        //Eliminamos imagen anterior

        $notification='El inmueble se ha actualizado correctamente';

        return redirect('/inmuebles')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inmueble $inmueble)
    {
        //Guardar vieja imagen para eliminarlo
        $oldNameImg=public_path().'/storage/img_inmuebles/'.$inmueble->img;

        $inmueble->delete();
        //ELIMINAMOS IMAGEN
        if(file_exists($oldNameImg)){
            unlink($oldNameImg);
        }
        $notification='El inmueble se ha eliminado correctamente';

        return redirect('/inmuebles')->with(compact('notification'));
    }
}
