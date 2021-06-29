<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\AlumnosImport;
use App\Models\Alumnos;
use App\Models\apoderado;
use App\Models\asigncion;
use App\Models\prestamo;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Stmt\TryCatch;

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
                
                ->where('alumnos.estado','activo')
                //->select('alumnos.nombre,alumnos.rut,asigncion.descripcion,asigncions.asignacion')
                ->get();
        //$alumnos = Alumnos::all();
        
        $prestamos=prestamo::select('*')->get();
        
     
        
        return view('admin.listado',compact('alumnos','prestamos'));
    }
    function import(Request $request){
        try {
            DB::table('prestamos')->delete();
            DB::table('asigncions')->delete();
            DB::table('alumnos')->delete();
            DB::table('apoderados')->delete();
             Excel::import(new AlumnosImport,request()->file('fileup'));
             return back()->with('message','Importacion creada revise el listado de registros');
        } catch (\Throwable $th) {
            return back()->with('message','SUBE UN EXCEL CON LOS DATOS CORRECTOS!');
        }
       
        
             
        
    }

    function prestamo($id){
        $r_alumno=strval($id);
        $alumnos =DB::table('alumnos')->where('rut',$r_alumno)->get();
        $apoderados =Alumnos::join('asigncions','asigncions.id_alumnos','=','alumnos.id')->join('apoderados','asigncions.id_apoderados','=','apoderados.id')->select('apoderados.rut_apo','apoderados.nombre_apo','apoderados.telefono_apo')->where('asigncions.id_alumnos',intval($alumnos[0]->id))->get();
        //$alumno=Alumnos::find($id);
        echo "<script>console.log(".$alumnos.")</script>";
        return view('admin.prestamo',compact('alumnos','apoderados'));
    }

    function pdf(Request $request){
        $r_alumno=strval($request->alumno_rut);
        $alumnos =DB::table('alumnos')->where('rut',$r_alumno)->get();
        $dia=Carbon::now()->timezone("America/Santiago")->format('d');
        $mes=Carbon::now()->timezone("America/Santiago")->format('m');
        $ano=strval(Carbon::now()->timezone("America/Santiago")->format('y'));
                        if ($mes==01) {
                            $mes="enero";
                        }elseif ($mes==01) {
                            # code...
                        }elseif ($mes==02) {
                            # code...
                            $mes="febreo";
                        }elseif ($mes==03) {
                            # code...
                            $mes="marzo";
                        }elseif ($mes==04) {
                            # code...
                            $mes="abril";
                        }elseif ($mes==05) {
                            # code...
                            $mes="mayo";
                        }elseif ($mes==06) {
                            # code...
                            $mes="junio";
                        }elseif ($mes==07) {
                            # code...
                            $mes="julio";
                        }elseif ($mes==8) {
                            # code...
                            $mes="agosto";
                        }elseif ($mes==9) {
                            # code...
                            $mes="septiembre";
                        }elseif ($mes==10) {
                            # code...
                            $mes="octubre";
                        }elseif ($mes==11) {
                            # code...
                            $mes="noviembre";
                        }elseif ($mes==12) {
                            # code...
                            $mes="diciembre";
                        }
        $fecha_actual=$dia." de ".$mes." del 20".$ano." ";

        
       
        $fecha=Carbon::now()->timezone("America/Santiago")->format('d-m-y');
        $hora=Carbon::now()->timezone("America/Santiago")->toTimeString();
        $id_a=$alumnos[0]->id;
        $apo =DB::table('apoderados')->where('rut_apo',$request->apoderado_rut)->get();
        //arreglar el select para traer los datos del pdf
        $id_apo=$apo[0]->id;
        $asignacion =Alumnos::join('asigncions','asigncions.id_alumnos','=','alumnos.id')->join('apoderados','asigncions.id_apoderados','=','apoderados.id')->select('apoderados.rut_apo','apoderados.nombre_apo','apoderados.telefono_apo')->where('asigncions.id_alumnos',intval($id_a))->get();
        
        $prestamo=prestamo::select('*')->where('id_apoderados',$id_apo)->first();

        if($prestamo===null){
            $prestamo = new prestamo();
            $prestamo->id_apoderados=$id_apo;
            $prestamo->id_alumnos=$id_a;
            $prestamo->marca=$request->select;
            $prestamo->s_n=$request->s_n;
           
            $prestamo->estado="activo";
            $prestamo->save();
        }else{
            DB::table('prestamos')->where('id_apoderados',$id_apo)->update(['marca'=>$request->select,'s_n'=>$request->s_n,'estado'=>'activo']);
        }
        
        


        

        $marca=$request->select;
        $s_n=$request->s_n;
        $pdf = PDF::loadView('admin.pdf_prestamo', compact('s_n','marca','alumnos','asignacion','fecha_actual','hora'));
        return $pdf->stream();
        //return view('admin.pdf_prestamo',compact('asignacion'));
    }
     function nuevo(){
         $mensaje="r";
        return view('admin.nuevo',compact('mensaje'));
     }
     function crear(Request $request){
         
        
                    //insert de los alumnos
                    $notaNueva = new Alumnos();
                    $notaNueva->marca_temporal = Carbon::now()->timezone("America/Santiago");
                    $notaNueva->nombre = $request->nombre_alumno;
                    $notaNueva->curso = $request->curso_alumno;
                    $notaNueva->rut = $request->rut_alumno;
                    $notaNueva->estado="activo";
                 
        
                    $notaNueva->save();
                    $id_alumno=$notaNueva->id;
        
                    //insert de los apoderados
                    $notaNueva = new apoderado();
                    $notaNueva->nombre_apo = $request->nombre_apoderado;
                    $notaNueva->rut_apo = $request->rut_apoderado;
                    $notaNueva->telefono_apo =$request->telefono_apoderado;
                    $notaNueva->correo_apo = $request->correo_apoderado;
                   
                    $notaNueva->estado="activo";
                    
        
                    $notaNueva->save();
                    $id_apoderado=$notaNueva->id;
        
                    //insert de asignaciones-- falta agregar unos datos
                    $notaNueva = new asigncion();
                    $notaNueva->descripcion = $request->descripcion;
                    $notaNueva->asignacion = "";
                    $notaNueva->id_alumnos = $id_alumno;
                    
                    $notaNueva->id_apoderados = $id_apoderado;
                    $notaNueva->estado="activo";
        
                            
                    $mensaje="mensaje";
                    $notaNueva->save();

                    $prestamo = new prestamo();
                    $prestamo->id_apoderados=$id_apoderado;
                    $prestamo->id_alumnos=$id_alumno;
                    //$prestamo->marca=$request->select;
                    //$prestamo->s_n=$request->s_n;
                
                    $prestamo->estado="inactivo";
                    $prestamo->save();
                    return view('admin.nuevo',compact('mensaje'));
                    //return back()->with('message','datos ingresdo correctamente!');

     }
     public function devolucion($id)
     {
        $r_alumno=strval($id);
        $alumnos =DB::table('alumnos')->where('rut',$r_alumno)->get();
        $apoderados =Alumnos::join('asigncions','asigncions.id_alumnos','=','alumnos.id')->join('apoderados','asigncions.id_apoderados','=','apoderados.id')->select('apoderados.rut_apo','apoderados.nombre_apo','apoderados.telefono_apo')->where('asigncions.id_alumnos',intval($alumnos[0]->id))->get();
        //$alumno=Alumnos::find($id);
        echo "<script>console.log(".$alumnos.")</script>";
        return view('admin.devolucion',compact('alumnos','apoderados'));
         # code...
        
     }
     public function pdf_devolucion(Request $request)
     {
        $r_alumno=strval($request->alumno_rut);
        $alumnos =DB::table('alumnos')->where('rut',$r_alumno)->get();
        $apoderados =Alumnos::join('asigncions','asigncions.id_alumnos','=','alumnos.id')->join('apoderados','asigncions.id_apoderados','=','apoderados.id')->select('apoderados.rut_apo','apoderados.nombre_apo','apoderados.telefono_apo')->where('asigncions.id_alumnos',intval($alumnos[0]->id))->get();
        //$alumno=Alumnos::find($id);
        $dia=Carbon::now()->timezone("America/Santiago")->format('d');
        $mes=Carbon::now()->timezone("America/Santiago")->format('m');
        $ano=strval(Carbon::now()->timezone("America/Santiago")->format('y'));
                        if ($mes==01) {
                            $mes="enero";
                        }elseif ($mes==01) {
                            # code...
                        }elseif ($mes==02) {
                            # code...
                            $mes="febreo";
                        }elseif ($mes==03) {
                            # code...
                            $mes="marzo";
                        }elseif ($mes==04) {
                            # code...
                            $mes="abril";
                        }elseif ($mes==05) {
                            # code...
                            $mes="mayo";
                        }elseif ($mes==06) {
                            # code...
                            $mes="junio";
                        }elseif ($mes==07) {
                            # code...
                            $mes="julio";
                        }elseif ($mes==8) {
                            # code...
                            $mes="agosto";
                        }elseif ($mes==9) {
                            # code...
                            $mes="septiembre";
                        }elseif ($mes==10) {
                            # code...
                            $mes="octubre";
                        }elseif ($mes==11) {
                            # code...
                            $mes="noviembre";
                        }elseif ($mes==12) {
                            # code...
                            $mes="diciembre";
                        }
        $fecha_actual=$dia." de ".$mes." del 20".$ano." ";
        $hora=Carbon::now()->timezone("America/Santiago")->toTimeString();
        $id_a=$alumnos[0]->id;
        $asignacion =Alumnos::join('asigncions','asigncions.id_alumnos','=','alumnos.id')->join('apoderados','asigncions.id_apoderados','=','apoderados.id')->select('apoderados.rut_apo','apoderados.nombre_apo','apoderados.telefono_apo')->where('asigncions.id_alumnos',intval($id_a))->get();
        echo "<script>console.log(".$alumnos.")</script>";
        $detalle=$request->comentario;

        $apo =DB::table('apoderados')->where('rut_apo',$request->apoderado_rut)->get();       
        $id_apo=$apo[0]->id;

        DB::table('prestamos')->where('id_apoderados',$id_apo)->update(['comentario'=>$request->comentario,'estado'=>'inactivo']);
        
        //$notaNueva = new prestamo();
        
        //$notaNueva->estado="activo";
        
                            
        $mensaje="mensaje";
        //$notaNueva->save();

        $pdf = PDF::loadView('admin.pdf_devolucion', compact('detalle','alumnos','apoderados','fecha_actual','hora','asignacion'));
        return $pdf->stream();

        //return view('admin.pdf_devolucion',compact('alumnos','apoderados','fecha_actual','hora','asignacion'));
     }
     public function pdf_devolucion1(Request $request)
     {
         $data=$request;
         echo "<script>console.log('este es el nombre'".$request->alumno_nombre.")</script>";
         
        return view('admin.devo',compact('data'));
     }
}
