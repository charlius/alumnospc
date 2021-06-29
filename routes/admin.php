<?php

use App\Exports\AlumnosExport;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\homeControllers;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

Route::post('import', [homeControllers::class, 'import'])->name('import');
Route::post('pdf_devolucion1',[homeControllers::class,'pdf_devolucion1'])->name('pdf_devolucion1');
Route::get('',[homeControllers::class,'index']);
Route::get('excel',[homeControllers::class,'excel']);
Route::get('listado',[homeControllers::class,'listado']);
Route::get('prestamo/{id}',[homeControllers::class,'prestamo']);
Route::post('pdf',[homeControllers::class,'pdf'])->name('pdf');
Route::get('nuevo/',[homeControllers::class,'nuevo']);
Route::post('crear', [homeControllers::class, 'crear'])->name('crear');
Route::get('devolucion/{id}', [homeControllers::class, 'devolucion'])->name('devolucion');
Route::post('pdf_devolucion/',[homeControllers::class,'pdf_devolucion'])->name('pdf_devolucion');
Route::get('download', function () {
    $ano=strval(Carbon::now()->timezone("America/Santiago")->format('y'));
    return Excel::download(new AlumnosExport, 'alumnos_20'.$ano.'.xlsx');
});

