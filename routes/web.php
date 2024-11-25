<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarrerasController;
use App\Http\Controllers\FacultadesController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\TipoMateriaController;
use App\Http\Controllers\Materia_carreraController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\Material_materiaController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\NavBar;
use App\Http\Controllers\SemestreCarreraController;
use App\Http\Controllers\RedMateriasController;



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
    Route::resource('carreras', CarrerasController::class);
    Route::resource('facultades', FacultadesController::class);
    Route::resource('materias', MateriasController::class);
    Route::resource('tipo_materias', TipoMateriaController::class);
    Route::resource('carrera_materia', Materia_carreraController::class);
    Route::resource('tipos',TipoController ::class);
    Route::resource('material', Material_materiaController::class);
    
});

Route::get('/', [FacultadesController::class, 'publicindex'])->name('facultades.public.index');
Route::get('/materiales', [Material_materiaController::class, 'publicIndex'])->name('material.public.index');
Route::get('/homepage', function () {
    return view('admin.home');
})->name('homepage');

Route::get('/IMTC', function () {
    return view('carreras.IMTC');
})->name('IMTC');

Route::get('/algo', function () {
    return view('Carreras.algo');
})->name('algo');

Route::get('/IMTCc', function () {
    return view('Facultades.indexRed');
})->name('IMTCc');



Route::get('/video/{filename}', [VideoController::class, 'show'])->name('video.show');
Route::get('/pdfs/{filename}', [PdfController::class, 'show'])->name('pdf.show');
Route::post('/get-carreras', [NavBar::class, 'getCarrerasByFacultad'])->name('get.carreras');

Route::get('/semestres', [SemestreCarreraController::class, 'index'], )->name('semestres.index');
Route::post('/semestres/asignar', [SemestreCarreraController::class, 'asignarMaterias'])->name('semestres.asignar');

Route::get('/facultades/carrera/{id}', [RedMateriasController::class, 'show'])->name('Facultades.indexRed');
Route::get('/ruta/{id}', [CarrerasController::class, 'publicindex'])->name('Facultades.indexRed');




require __DIR__.'/auth.php';
