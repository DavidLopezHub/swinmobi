<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes=User::clients()->paginate(10);
        return view('clientes.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role='Cliente';
        return view('clientes.create',compact('role'));
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
        $cliente=User::clientes()->findOrFail($id);
        // dd($cliente);
        return view('clientes.edit')->with(compact('cliente'));
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
            'name.required'=>'El nombre del cliente es obligatorio',
            'name.min'=>'El nombre del cliente debe tener más de 3 caracteres',
            'email.required' =>'El correo elecgtronico es obligatorio',
            'email.email' =>'Ingresa un correo electronico válido',
            'cedula.required' =>'La cédula es obligatorio',
            'cedula.digits' =>'La cédula debe tener 8 digitos',
            'address.min' =>'La Direccion debe tener al menos 6 caracteres',
            'phone.required' =>'El numero de teléfono es obligatorio',
            'account_number.required' =>'El numero de cuenta es obligatorio',
        ];
        $this->validate($request,$rules,$messages);

        $user=User::clientes()->findOrFail($id);

        $data=$request->only('name','email','cedula','address','phone','account_number','account_number');
        $password= $request->input('password');

        if ($password) {
            $data ['password'] = bcrypt($password);
        }

        $user->fill($data);
        $user->save();
        $notification= 'La informacion del cliente se ha actualizado correctamente.';

        return redirect('/clientes')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=User::clientes()->findOrFail($id);
        $nombre=$user->name;
        $user->delete();

        $notification="El usuario $nombre ha sido eliminado correctamente";
        return redirect('/clientes')->with(compact('notification'));
    }
}
