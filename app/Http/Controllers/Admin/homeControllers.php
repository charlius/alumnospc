<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\AlumnosImport;
use App\Models\Alumnos;
use Maatwebsite\Excel\Facades\Excel;


class homeControllers extends Controller
{
    //
    function index(){

        return view('admin.index');
    }
    function excel(){
        $alumnos = Alumnos::all();
        return view('admin.upexcel');
    }
    function listado(){
        $alumnos = Alumnos::all();
       
        return view('admin.listado',compact('alumnos'));
    }
    function import(Request $request){
        Excel::import(new AlumnosImport,request()->file('file'));
             
        return back()->with('message','Importacion creada revise el listado de registros');
    }

    function prestamo($id){
        $alumno=Alumnos::find($id);
        return view('admin.prestamo',compact('alumno'));
    }
}
