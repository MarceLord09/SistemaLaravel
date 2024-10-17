<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller

{
    public function pdf(){
        $user=User::all();
        $pdf = Pdf::loadView('mantenedor.users.pdf', compact('user'));
        return $pdf->download('Reporte Usuarios.pdf');
    }
    public function showLogin()
    {
        return view('login');
    }   
    public function index()
    {
        $users = User::all();
        return view('mantenedor.users.index', compact('users'));
    }
    
   
    public function edit(User $user){
        $roles= Role::all();
        return view('mantenedor.users.edit', compact('user','roles'));
    }
    public function verificalogin(Request $request)
    {
        $data = request()->validate(
            [
                'name' => 'required',
                'password' => 'required'
            ],
            [
                'name.required' => 'Ingrese Usuario',
                'password.required' => 'Ingrese contraseña',
            ]
        );
        $user = User::where('name', $request->get('name'))->first();
        if (!$user) {
            return back()->withErrors(['name' => 'Usuario no válido'])->withInput(request(['name']));
        }
        if (Auth::attempt($data)) {
            $request->session()->put('name', $request->get('name')); //guardamos el nombre del usuario en la sesion
            return redirect('home');
        }
        return back()->withErrors(['password' => 'Contraseña no válida'])->withInput(request(['name', 'password']));
    }
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        return redirect()->route('mantenedor.users.edit', $user)->with('info', 'Se asignaron los roles correctamente.');
    }
    public function salir()
    {
        Auth::logout();
        return redirect('/');
    }
}



