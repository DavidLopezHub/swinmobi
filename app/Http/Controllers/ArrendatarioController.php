<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ArrendatarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $arrendatarios=User::arrendatarios()->paginate(10);
        return view('arrendatarios.index',compact('arrendatarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role='Arrendatario';
        return view('arrendatarios.create',compact('role'));
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
        $arrendatario=User::arrendatarios()->findOrFail($id);
        // dd($propietario);
        return view('arrendatarios.edit')->with(compact('arrendatario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules=[
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cedula'=> 'required|digits:8',
            'address'=> 'nullable|min:6',
            'phone'=> 'required',
            'account_number'=> 'required',
        ];
        $messages=[
            'name.required'=>'El nombre del arrendatario es obligatorio',
            'name.min'=>'El nombre del arrendatario debe tener más de 3 caracteres',
            'email.required' =>'El correo elecgtronico es obligatorio',
            'email.email' =>'Ingresa un correo electronico válido',
            'cedula.required' =>'La cédula es obligatorio',
            'cedula.digits' =>'La cédula debe tener 8 digitos',
            'address.min' =>'La Direccion debe tener al menos 6 caracteres',
            'phone.required' =>'El numero de teléfono es obligatorio',
            'account_number.required' =>'El numero de cuenta es obligatorio',
        ];
        $this->validate($request,$rules,$messages);

        $user=User::arrendatarios()->findOrFail($id);

        $data=$request->only('name','email','cedula','address','phone','account_number','account_number');
        $password= $request->input('password');

        if ($password) {
            $data ['password'] = bcrypt($password);
        }

        $user->fill($data);
        $user->save();
        $notification= 'La informacion del Arrendatario se ha actualizado correctamente.';

        return redirect('/arrendatarios')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=User::arrendatarios()->findOrFail($id);
        $nombre=$user->name;
        $user->delete();

        $notification="El usuario $nombre ha sido eliminado correctamente";
        return redirect('/arrendatarios')->with(compact('notification'));
    }
}
