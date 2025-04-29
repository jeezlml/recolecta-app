<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recoleccion;
use Illuminate\Support\Facades\Auth;

class RecoleccionController extends Controller
{
    public function programar(Request $request)
    {
       
        if (Auth::check()) {
            $recoleccion = new Recoleccion();
            $recoleccion->user_id = Auth::id(); 
            $recoleccion->tipo = $request->tipo;
            $recoleccion->fecha = $request->fecha;
            $recoleccion->save();

            return redirect('/programar')->with('success', '¡Recolección programada exitosamente!');
        }

        // Si el usuario no está autenticado, redirigimos al login
        return redirect('/login')->with('error', 'Debes estar logueado para programar una recolección.');
    }

    public function historial()
    {
        // Traemos las recolecciones solo del usuario autenticado
        if (Auth::check()) {
            $recolecciones = \App\Models\Recoleccion::where('user_id', Auth::id())->get();
            return view('historial', compact('recolecciones'));
        }

        // Si el usuario no está autenticado, redirigimos al login
        return redirect('/login')->with('error', 'Debes estar logueado para ver tu historial.');
    }

    public function showProgramarForm()
{
    return view('programar'); // <<--- Esto carga la vista "programar.blade.php"
}
}
