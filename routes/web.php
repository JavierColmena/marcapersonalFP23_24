<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReconocimientoController;
use App\Http\Controllers\CurriculoController;
use App\Models\Estudiante;

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

Route::get('/', [HomeController::class, 'getHome']);

Route::get('login', function () {
    return view('auth.login');
});

Route::get('logout', function () {
    return "Logout usuario";
});

Route::prefix('catalog')->group(function () {
    Route::get('/', [CatalogController::class, 'getIndex']);

    Route::get('/show/{id}', [CatalogController::class, 'getShow'])->where('id', '[0-9]+');

    Route::get('/create', [CatalogController::class, 'getCreate']);

    Route::get('/edit/{id}', [CatalogController::class, 'getEdit'])->where('id', '[0-9]+');

    Route::put('/edit/{id}', [CatalogController::class, 'putEdit'])->where('id', '[0-9]+');
});

Route::prefix('reconocimientos')->group(function () {
    Route::get('/', [ReconocimientoController::class, 'getIndex']);

    Route::get('/show/{id}', [ReconocimientoController::class, 'getShow'])->where('id', '[0-9]+');

    Route::get('/create', [ReconocimientoController::class, 'getCreate']);


    Route::put('/edit/{id}', [ReconocimientoController::class, 'putEdit'])->where('id', '[0-9]+');

    Route::get('/edit/{id}', [ReconocimientoController::class, 'getEdit'])->where('id', '[0-9]+');
});

Route::prefix('users')->group(function () {

    Route::get('/', [UserController::class, 'getIndex']);

    Route::get('/show/{id}', [UserController::class, 'getShow'])->where('id', '[0-9]+');

    Route::get('/create', [UserController::class, 'getCreate']);

    Route::put('/edit/{id}', [UserController::class, 'putEdit'])->where('id', '[0-9]+');

    Route::get('/edit/{id}', [UserController::class, 'getEdit'])->where('id', '[0-9]+');
});

Route::prefix('actividades')->group(function () {

    Route::get('/', [ActividadController::class, 'getIndex']);

    Route::get('/show/{id}', [ActividadController::class, 'getShow'])->where('id', '[0-9]+');

    Route::get('/create', [ActividadController::class, 'getCreate']);

    Route::get('/edit/{id}', [ActividadController::class, 'getEdit'])->where('id', '[0-9]+');

    Route::put('/edit/{id}', [ActividadController::class, 'putEdit'])->where('id', '[0-9]+');
});

Route::prefix('curriculos')->group(function () {

    Route::get('/', [CurriculoController::class, 'getIndex']);

    Route::get('/show/{id}', [CurriculoController::class, 'getShow'])->where('id', '[0-9]+');

    Route::get('/create', [CurriculoController::class, 'getCreate']);

    Route::get('/edit/{id}', [CurriculoController::class, 'getEdit'])->where('id', '[0-9]+');

    Route::put('/edit/{id}', [CurriculoController::class, 'putEdit'])->where('id', '[0-9]+');
});

Route::get('perfil/{id?}', function ($id = null) {
    if ($id == null) {
        return "Visualizar el currículo propio";
    } else {
        return "Visualizar el currículo de " . $id;
    }
})->where('id', '[0-9]+');


Route::get('pruebaDB', function () {
    // aquí irán el código que utiliza el modelo
    // $estudiante = Estudiante::findOrFail($id);

    // $estudiante = Estudiante::where('votos','>',100)->firstOrFail();

    // Obtener 10 estudiantes con más de 100 votos
    // $estudiantes = Estudiante::where('votos', '>', 100)->take(10)->get();

    // foreach ($estudiantes as $estudiante) {
    //     echo $estudiante->nombre . ' ' . $estudiante->votos . '<br />';
    // }

    // dd($estudiantes); //PARA DEPURAR
    // echo $estudiante->nombre;

    //INSERTAR
    // $count = Estudiante::where('votos', '>', 100)->count();
    // echo 'Antes: ' . $count . '<br />';

    // $estudiante = new Estudiante;
    // $estudiante->nombre = 'Juan';
    // $estudiante->apellidos = 'Martínez';
    // $estudiante->direccion = 'Dirección de Juan';
    // $estudiante->votos = 130;
    // $estudiante->confirmado = true;
    // $estudiante->ciclo = 'DAW';
    // $estudiante->save();

    // echo 'El estudiante tiene el id: ' . $estudiante->id . '<br/>';

    //ACTUALIZAR
    // $estudiante = Estudiante::find(42);
    // $estudiante->votos = 200;
    // $estudiante->save();


    //BORRAR
    $count = Estudiante::count();
    echo 'Antes: ' . $count . '<br />';
    $estudiante = Estudiante::findOrFail(42);
    $estudiante->delete();

    $count = Estudiante::count();
    echo 'Después: ' . $count . '<br />';

    // $count = Estudiante::where('votos', '>', 100)->count();
    // echo 'Después: ' . $count . '<br />';
});
