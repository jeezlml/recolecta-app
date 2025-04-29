<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function registrarUsuario(Request $request)
    {
        $user = new User();
        $user->nombre = $request->nombre;
        $user->telefono = $request->telefono;
        $user->direccion = $request->direccion;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->puntos = 0;
        $user->save();

        Auth::login($user);


        return redirect('/programar')->with('success', '¡Usuario registrado exitosamente!');
    }
}

