<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Models\Asignacion;
use App\Models\Trabajadores;

class AsignacionController extends Controller
{
    /**
     * Muestra el formulario para asignar un departamento.
     */
    public function showAsignarDepartamentoForm()
    {
        $departamentos = Departamento::all();
        return view('asignarDepartamento', compact('departamentos'));
    }

    public function showAsignarDepartamentoFormWithTrabajador($numeroTarjeta)
    {
        $departamentos = Departamento::all();
        $trabajador = Trabajadores::where('numeroTarjeta', $numeroTarjeta)->first();
        return view('asignarDepartamento', compact('departamentos', 'trabajador'));
    }

    /**
     * Procesa el formulario y registra la asignación.
     */
    public function registrarAsignacion(Request $request)
    {
        $request->validate([
            'id_departamento' => 'required|exists:departamentos,id_departamentos',
            'cargo' => 'required|string',
            'nombre' => 'required|string',
            'correo' => 'required|email',
            'extension' => 'nullable|integer',
        ]);

        Asignacion::create([
            'id_departamento' => $request->input('id_departamento'),
            'numeroTarjeta' => $request->input('numeroTarjeta'), // Agregado para la relación
            'cargo' => $request->input('cargo'),
            'nombre' => $request->input('nombre'),
            'correo' => $request->input('correo'),
            'extension' => $request->input('extension'),
        ]);

        return redirect()->route('dashboard')->with('success', 'Asignación registrada exitosamente');
    }
}

