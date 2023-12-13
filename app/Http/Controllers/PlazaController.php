<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plaza;

class PlazaController extends Controller
{
    public function showRegistroPlazas()
{
    //muestra las plazas registradas en la vista verRegistroPlazas
    $plazas = Plaza::all();
    return view('verRegistroPlazas', compact('plazas'));
}
    //Muestra el formulario de registro de plazas.
   
    public function showRegistrationForm()
    {
        return view('registrarPlazas');
    }

    //Procesa el formulario de registro de plazas y almacena los datos en la base de datos.

    public function register(Request $request)
    {
        $plazaCompleta = $request->input('indice') . $request->input('subindice') . $request->input('categoria') . $request->input('horas') . $request->input('plaza');

        // Crea un nuevo registro de Plaza con los datos del formulario y la concatenación
        Plaza::create([
            'indice' => $request->input('indice'),
            'subindice' => $request->input('subindice'),
            'categoria' => $request->input('categoria'),
            'horas' => $request->input('horas'),
            'plaza' => $request->input('plaza'),
            'tipoCategoria' => $request->input('tipoCategoria'),
            'plazaCompleta' => $plazaCompleta,
        ]);
        // Redirecciona a la vista de verRegistroPlazas con un mensaje de éxito
        return redirect()->route('verRegistroPlazas')->with('success', 'Registro de plaza exitoso');
    }
}

