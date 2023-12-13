<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TableRol; // Asegúrate de importar el modelo correcto

class RolController extends Controller
{
    public function verRoles()
{
    $roles = TableRol::all(); // Obtén todos los roles de la base de datos

    return view('verRoles', ['roles' => $roles]);
}
    /**
     * Muestra el formulario de registro de roles.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('registrarRol');
    }

    /**
     * Procesa el formulario de registro de roles y almacena los datos en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|unique:table_rols,nombre', // Ajusta el nombre de la tabla
            'descripcion' => 'nullable|string',
            // Puedes agregar otras reglas de validación según tus necesidades
        ]);

        // Crea un nuevo registro de Rol con los datos del formulario
        TableRol::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            // Puedes agregar otros campos según sea necesario
        ]);

        // Redirecciona de vuelta con un mensaje de éxito
        return redirect()->route('verRoles')->with('success', 'Registro exitoso');
    }
}
