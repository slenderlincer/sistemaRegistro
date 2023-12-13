<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;

class DepartamentoController extends Controller
{
    public function verAsignaciones($id_departamento)
    {
        $departamento = Departamento::with('asignaciones')->findOrFail($id_departamento);
        $asignaciones = $departamento->asignaciones ?? collect();

        // Mover la construcción del título aquí, después de obtener el departamento
        $titulo = "Asignaciones del departamento " . $departamento->tipoDepartamento;

        return view('verAsignaciones', compact('asignaciones', 'titulo'));
    }
    /**
     * Muestra todos los departamentos.
     *
     * @return \Illuminate\View\View
     */
    public function showDepartamentos()
    {
        $departamentos = Departamento::all();
        return view('verRegistroDepartamentos', compact('departamentos'));
    }

    /**
     * Muestra el formulario de registro de departamento.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
       return view('registrarDepartamentos');
    }

    /**
     * Procesa el formulario de registro de departamento y almacena los datos en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $request->validate([
            'tipoDepartamento' => 'required|string',
            // Otros campos de validación según sea necesario
        ]);

        // Crea un nuevo registro de Departamento con los datos del formulario
        Departamento::create([
            'tipoDepartamento' => $request->input('tipoDepartamento'),
            // Otros campos según sea necesario
        ]);

        // Redirecciona de vuelta con un mensaje de éxito
        return redirect()->route('verRegistroDepartamentos')->with('success', 'Registro exitoso');
    }
}