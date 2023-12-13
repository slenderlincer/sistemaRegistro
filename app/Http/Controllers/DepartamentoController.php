<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;

class DepartamentoController extends Controller
{
    public function verAsignaciones($id_departamento)
    {
        //Carga un departamento con sus asignaciones relacionadas y las ingresa en la variable asignaciones
        $departamento = Departamento::with('asignaciones')->findOrFail($id_departamento);
        $asignaciones = $departamento->asignaciones ?? collect();

        // Titlo para el tipo de departamento
        $titulo = "Asignaciones del departamento " . $departamento->tipoDepartamento;

        return view('verAsignaciones', compact('asignaciones', 'titulo'));
    }

    public function showDepartamentos()
    {
        $departamentos = Departamento::all();
        return view('verRegistroDepartamentos', compact('departamentos'));
    }


    public function showRegistrationForm()
    {
       return view('registrarDepartamentos');
    }

    
    //Procesa el formulario de registro de departamento y almacena los datos en la base de datos.
     
    public function register(Request $request)
    {
        $request->validate([
            'tipoDepartamento' => 'required|string',

        ]);

        // Crea un nuevo registro de Departamento con los datos del formulario
        Departamento::create([
            'tipoDepartamento' => $request->input('tipoDepartamento'),
            
        ]);

        // Redirecciona de a la vista para ver los registros de departamentos con un mensaje de éxito
        return redirect()->route('verRegistroDepartamentos')->with('success', 'Registro exitoso');
    }
}