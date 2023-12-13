<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TableRol;

class RolController extends Controller
{
    public function verRoles()
{
    $roles = TableRol::all(); // Obtén tiene todos los roles de la base de datos

    //Los muestra en la vista "verRoles"
    return view('verRoles', ['roles' => $roles]);
}
    //Muestra el formulario de registro de roles.

    public function showRegistrationForm()
    {
        return view('registrarRol');
    }

    //Procesa el formulario de registro de roles y almacena los datos en la base de datos.
 
    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|unique:table_rols,nombre', 
            'descripcion' => 'nullable|string',
           
        ]);

        // Crea un nuevo registro de Rol con los datos del formulario
        TableRol::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),

        ]);

        // Redirecciona a la vista verRoles con un mensaje de éxito
        return redirect()->route('verRoles')->with('success', 'Registro exitoso');
    }
}
