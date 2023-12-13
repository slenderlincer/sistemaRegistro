<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trabajadores;
use App\Models\Plaza;
use App\Models\Departamento;
use App\Models\TableRol;
use App\Models\Asignacion;


class TrabajadorController extends Controller
{
    public function editarTrabajador($numeroTarjeta)
    {
        $trabajador = Trabajadores::where('numeroTarjeta', $numeroTarjeta)->firstOrFail();
        $plazas = Plaza::all();
        $roles = TableRol::all();
        $departamentos = Departamento::all();
    
         // Define la variable $editar
         $modoEdicion = true;
    
        // Aquí usamos la misma vista que en el registro, pero pasamos un flag para indicar que estamos editando
        return view('registrarPersonal', compact('trabajador', 'plazas', 'roles', 'departamentos', 'modoEdicion'));
    }


    public function eliminarTrabajador($numeroTarjeta)
{
     // Eliminar al trabajador
     Trabajadores::where('numeroTarjeta', $numeroTarjeta)->delete();

     // Eliminar asignaciones relacionadas
     Asignacion::where('numeroTarjeta', $numeroTarjeta)->delete();

    // Redirecciona de vuelta con un mensaje de éxito
    return redirect()->route('verRegistroTrabajadores')->with('success', 'Trabajador eliminado exitosamente');
}
    public function verPersonal()
    {   
        $trabajadores = Trabajadores::all();
        return view('verRegistroTrabajadores', compact('trabajadores'));
    }
    public function showRegistrationForm()
    {
        $plazas = Plaza::all();
        $roles = TableRol::all();
        $departamentos = Departamento::all();
        return view('registrarPersonal', compact('plazas', 'roles', 'departamentos'));
    }

    /**
     * Procesa el formulario de registro de trabajadores y almacena los datos en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $NombreCompleto = $request->input('Nombre') . ' ' . $request->input('ApellidoPaterno') . ' ' . $request->input('ApellidoMaterno');
        $request->validate([
            'numeroTarjeta' => 'required|integer',
            'Nombre' => 'required|string',
            'ApellidoPaterno' => 'required|string',
            'ApellidoMaterno' => 'required|string',
            'Sexo' => 'required|string',
            'Correo' => 'required|email',
            'Telefono'=> 'required|integer',
            'RFC' => 'required|string',
            'CURP' => 'required|string',
            'fecha_nacimiento' => 'required|date',
            'Antiguedad' => 'required|integer',
            'Grado' => 'required|string',
            'id_plaza' => 'required|integer', // Asegúrate de ajustar según el nombre real del campo
            'id_rol' => 'required|integer',
            'Discapacidad' => 'nullable|string', // Puedes ajustar según tus necesidades
            'Sistema' => 'required|string',
            'Posgrado' => 'required|string',
            'Dedicacion' => 'required|string',
        ]);

        // Crea un nuevo registro de Trabajador con los datos del formulario
        Trabajadores::create([
            'numeroTarjeta' => $request->input('numeroTarjeta'),
            'Nombre' => $request->input('Nombre'),
            'ApellidoPaterno' => $request->input('ApellidoPaterno'),
            'ApellidoMaterno' => $request->input('ApellidoMaterno'),
            'NombreCompleto' => $NombreCompleto,
            'Sexo' => $request->input('Sexo'),
            'Correo' => $request->input('Correo'),
            'Telefono' => $request->input('Telefono'),
            'RFC' => $request->input('RFC'),
            'CURP' => $request->input('CURP'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'Antiguedad' => $request->input('Antiguedad'),
            'Grado' => $request->input('Grado'),
            'id_plaza' => $request->input('id_plaza'),
            'id_rol' => $request->input('id_rol'),
            'Discapacidad' => $request->input('Discapacidad'),
            'Sistema' => $request->input('Sistema'),
            'Posgrado' => $request->input('Posgrado'),
            'Dedicacion' => $request->input('Dedicacion'),
        ]);

        // Redirecciona de vuelta con un mensaje de éxito
        return redirect()->route('verRegistroTrabajadores')->with('success', 'Registro de trabajador exitoso');
    }

    /**
     * Actualiza los datos del trabajador en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $numeroTarjeta
     * @return \Illuminate\Http\Response
     */
    public function actualizarTrabajador(Request $request, $numeroTarjeta)
    {
        $request->validate([
            // ... (Agrega las reglas de validación según tus necesidades)
        ]);

        // Obtén el trabajador por su número de tarjeta
        $trabajador = Trabajadores::where('numeroTarjeta', $numeroTarjeta)->firstOrFail();

        // Actualiza los campos del trabajador con los nuevos datos
        $trabajador->fill([
            'numeroTarjeta' => $request->input('numeroTarjeta'),
            'Nombre' => $request->input('Nombre'),
            'ApellidoPaterno' => $request->input('ApellidoPaterno'),
            'ApellidoMaterno' => $request->input('ApellidoMaterno'),
            'Sexo' => $request->input('Sexo'),
            'Correo' => $request->input('Correo'),
            'Telefono' => $request->input('Telefono'),
            'RFC' => $request->input('RFC'),
            'CURP' => $request->input('CURP'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'Antiguedad' => $request->input('Antiguedad'),
            'Grado' => $request->input('Grado'),
            'id_plaza' => $request->input('id_plaza'),
            'id_rol' => $request->input('id_rol'),
            'Discapacidad' => $request->input('Discapacidad'),
            'Sistema' => $request->input('Sistema'),
            'Posgrado' => $request->input('Posgrado'),
            'Dedicacion' => $request->input('Dedicacion'),
        ]);

        // Guarda los cambios en la base de datos
        $trabajador->save();

        // Redirecciona de vuelta con un mensaje de éxito
        return redirect()->route('verRegistroTrabajadores')->with('success', 'Trabajador actualizado exitosamente');
    }
}
