<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\homeControllers;

Route::post('import', [homeControllers::class, 'import'])->name('import');
Route::get('',[homeControllers::class,'index']);
Route::get('excel',[homeControllers::class,'excel']);
Route::get('listado',[homeControllers::class,'listado']);
Route::get('prestamo/{id}',[homeControllers::class,'prestamo']);
Route::get('pdf/{id}',[homeControllers::class,'pdf']);
