<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\AlumnosImport;
use App\Models\Alumnos;
use App\Models\asigncion;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
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
        $alumnos = asigncion::join("alumnos","asigncions.id_alumnos","=","alumnos.id")
                ->join('apoderados','asigncions.id_apoderados','=','apoderados.id')
                //->select('alumnos.nombre,alumnos.rut,asigncion.descripcion,asigncions.asignacion')
                ->get();
        //$alumnos = Alumnos::all();
     
        
        return view('admin.listado',compact('alumnos'));
    }
    function import(Request $request){
        Excel::import(new AlumnosImport,request()->file('fileup'));
        
             
        return back()->with('message','Importacion creada revise el listado de registros');
    }

    function prestamo($id){
        $r_alumno=strval($id);
        $alumnos =DB::table('alumnos')->where('rut',$r_alumno)->get();
        //$alumno=Alumnos::find($id);
        echo "<script>console.log(".$alumnos.")</script>";
        return view('admin.prestamo',compact('alumnos'));
    }

    function pdf($id){
        $r_alumno=strval($id);
        $pdf = PDF::loadView('admin.pdf_prestamo', compact('r_alumno'));
        return $pdf->stream();
    }
}
