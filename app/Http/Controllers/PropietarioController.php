<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class PropietarioController extends Controller
{


    public function index()
    {
        $propietarios=User::propietarios()->paginate(10);
        return view('propietarios.index',compact('propietarios'));
    }


    public function create()
    {
        $role='Propietario';
        return view('auth.register',compact('role'));
    }


    public function store(Request $request)
    {
        // dd($request);
        $rules=[
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cedula'=> 'required|digits:8',
            'address'=> 'nullable|min:6',
            'phone'=> 'required',
            'account_number'=> 'required',
        ];
        $messages=[
            'name.required'=>'El nombre del propietario es obligatorio',
            'name.min'=>'El nombre del propietario debe tener más de 3 caracteres',
            'email.required' =>'El correo elecgtronico es obligatorio',
            'email.email' =>'Ingresa un correo electronico válido',
            'cedula.required' =>'La cédula es obligatorio',
            'cedula.digits' =>'La cédula debe tener 8 digitos',
            'address.min' =>'La Direccion debe tener al menos 6 caracteres',
            'phone.required' =>'El numero de teléfono es obligatorio',
            'account_number.required' =>'El nombre de la empresa es obligatorio',
        ];
        $this->validate($request,$rules,$messages);

        return User::create(
            $request->only('name','email','cedula','address','phone','account_number')
            +[
                'role'=>'Propietario',
                'password'=> bcrypt( $request->input('password')),
            ]
        );
        // $notification= 'El Propietario se ha registrado correctamente.';

        // return redirect('/home');
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $propietario=User::propietarios()->findOrFail($id);
        // dd($propietario);
        return view('propietarios.edit')->with(compact('propietario'));
    }


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
            'name.required'=>'El nombre del propietario es obligatorio',
            'name.min'=>'El nombre del propietario debe tener más de 3 caracteres',
            'email.required' =>'El correo elecgtronico es obligatorio',
            'email.email' =>'Ingresa un correo electronico válido',
            'cedula.required' =>'La cédula es obligatorio',
            'cedula.digits' =>'La cédula debe tener 8 digitos',
            'address.min' =>'La Direccion debe tener al menos 6 caracteres',
            'phone.required' =>'El numero de teléfono es obligatorio',
            'account_number.required' =>'El numero de cuenta es obligatorio',
        ];
        $this->validate($request,$rules,$messages);

        $user=User::propietarios()->findOrFail($id);

        $data=$request->only('name','email','cedula','address','phone','account_number','account_number');
        $password= $request->input('password');

        if ($password) {
            $data ['password'] = bcrypt($password);
        }

        $user->fill($data);
        $user->save();
        $notification= 'La informacion del Propietario se ha actualizado correctamente.';

        return redirect('/propietarios')->with(compact('notification'));
    }


    public function destroy(string $id)
    {
        $user=User::propietarios()->findOrFail($id);
        $nombre=$user->name;
        $user->delete();

        $notification="El usuario $nombre ha sido eliminado correctamente";
        return redirect('/propietarios')->with(compact('notification'));
    }
}
