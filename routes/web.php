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


Route::get('/video/{filename}', [VideoController::class, 'show'])->name('video.show');
Route::get('/pdfs/{filename}', [PdfController::class, 'show'])->name('pdf.show');


require __DIR__.'/auth.php';
