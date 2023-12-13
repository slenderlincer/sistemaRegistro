<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrabajadorController;
use App\Http\Controllers\PlazaController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\AsignacionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Rutas para la vista de formularios
Route::view('/registrarPersonal', "registrarPersonal")->name('registrarPersonal');
Route::view('/registrarPlazas', "registrarPlazas")->name('registrarPlazas');
Route::view('/registrarDepartamentos', "registrarDepartamentos")->name('registrarDepartamentos');
Route::view('/registrarRol', "registrarRol")->name('registrarRol');
Route::view('/asignarDepartamento', "asignarDepartamento") ->name('asignarDepartamento');

//Ruta para la vista de registros
Route::view('/registros', "registros") ->name('registros');
Route::view('/verRegistroTrabajadores', "verRegistroTrabajadores") ->name('verRegistroTrabajadores');
Route::view('/verRegistroPlazas', "verRegistroPlazas") ->name('verRegistroPlazas');
Route::view('/verRegistroDepartamentos', "verRegistroDepartamentos") ->name('verRegistroDepartamentos');
Route::view('/verRoles', "verRoles")->name('verRoles');
Route::view('/verAsignaciones', "verAsignaciones")->name('verAsignaciones');

//Ruta para los controladores
// Procesar el formulario para registrar trabajador (método POST)
Route::get('/registrarPersonal', [TrabajadorController::class, 'showRegistrationForm'])->name('registrarPersonal');
Route::post('/registrarPersonal', [TrabajadorController::class, 'register'])->name('registrarTrabajadores');

//Procesar el formulario para registrar plazas (metodos POST y GET)
Route::get('/registrarPlazas', [PlazaController::class, 'showRegistrationForm'])->name('registrarPlazas');
Route::post('/registrarPlazas', [PlazaController::class, 'register']);

//Procesar el formulario para registrar departamentos (metodos POST y GET)
Route::get('/registrarDepartamentos', [DepartamentoController::class, 'showRegistrationForm'])->name('registrarDepartamentos');
Route::post('/registrarDepartamentos', [DepartamentoController::class, 'register']);

//Procesar el formulario para crear nuevos roles (metodos POST y GET)
Route::get('/registrarRol', [RolController::class, 'showRegistrationForm'])->name('mostrarFormularioRoles');
Route::post('/registrarRol', [RolController::class, 'register'])->name('registrarRol');

//Procesar el formulario para asignar a un personal un departamento (metodos POST y GET)
Route::get('/asignarDepartamento', [AsignacionController::class, 'showAsignarDepartamentoForm'])->name('asignarDepartamento');
Route::post('/asignarDepartamento', [AsignacionController::class, 'registrarAsignacion'])->name('asignarDepartamento');
Route::get('/asignarDepartamento/{numeroTarjeta}', [AsignacionController::class, 'showAsignarDepartamentoFormWithTrabajador'])->name('asignarDepartamento.trabajador');

//Ruta para mostrar la lista de plazas
Route::get('/verRegistroPlazas', [PlazaController::class, 'showRegistroPlazas'])->name('verRegistroPlazas');

// Ruta para mostrar la lista de departamentos
Route::get('/verRegistroDepartamentos', [DepartamentoController::class, 'showDepartamentos'])->name('verRegistroDepartamentos');

//Ruta para mostrar lista de Roles guardados
Route::get('/verRoles', [RolController::class, 'verRoles'])->name('verRoles');

//Ruta para mostrar la lista de trabajadores
Route::get('/verRegistroTrabajadores', [TrabajadorController::class, 'verPersonal'])->name('verRegistroTrabajadores');

Route::get('/verAsignaciones/{id_departamento}', [DepartamentoController::class, 'verAsignaciones'])->name('verAsignaciones');

//Ruta para eliminar un trabajador
Route::get('/eliminarTrabajador/{numeroTarjeta}', [TrabajadorController::class, 'eliminarTrabajador'])->name('eliminarTrabajador');

// La ruta para editar un trabajador (mostrar formulario de edición)
Route::get('/editarTrabajador/{numeroTarjeta}', [TrabajadorController::class, 'editarTrabajador'])->name('editarTrabajador');

// La ruta para actualizar un trabajador (procesar el formulario de edición)
Route::post('/editarTrabajador/{numeroTarjeta}', [TrabajadorController::class, 'actualizarTrabajador'])->name('actualizarTrabajador');

require __DIR__.'/auth.php';
