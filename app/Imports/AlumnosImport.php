<?php

namespace App\Imports;

use Illuminate\Support\Facades\DB;
use App\Models\Alumnos;
use App\Models\apoderado;
use App\Models\asigncion;
use App\Models\prestamo;
use Carbon\Exceptions\Exception;
use Maatwebsite\Excel\Concerns\ToModel;

class AlumnosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)

    {
        
        

        
                if($row[9]=='SI')
                //if(true)
                {
            
                    //insert de los alumnos
                    $notaNueva = new Alumnos();
                    $notaNueva->marca_temporal = $row[0];
                    $notaNueva->nombre = $row[1];
                    $notaNueva->curso = $row[2];
                    $notaNueva->estado="activo";
                    if($row[3]==null){
                        $notaNueva->rut = "sin rut";
                    }else{
                        $notaNueva->rut = $row[3];
                    }
                
        
                    $notaNueva->save();
                    $id_alumno=$notaNueva->id;
        
                    //insert de los apoderados
                    $notaNueva = new apoderado();
                    $notaNueva->nombre_apo = $row[4];
                    if($row[5]==null){
                        $notaNueva->rut_apo = "sin rut";
                    }else{
                        $notaNueva->rut_apo = $row[5];
                    }
                
                    $notaNueva->telefono_apo = $row[6];
                    $notaNueva->correo_apo = $row[7];
                    $notaNueva->estado="activo";
                    
        
                    $notaNueva->save();
                    $id_apoderado=$notaNueva->id;
        
                    //insert de asignaciones-- falta agregar unos datos
                    $notaNueva = new asigncion();
                    $notaNueva->descripcion = $row[8];
                    $notaNueva->asignacion = $row[9];
                    $notaNueva->id_alumnos = $id_alumno;
                    
                    $notaNueva->id_apoderados = $id_apoderado;
                    $notaNueva->estado="activo";
        
                            
        
                    $notaNueva->save();
                    //$id_apoderado=$notaNueva->id;

                    $prestamo = new prestamo();
                    $prestamo->id_apoderados=$id_apoderado;
                    $prestamo->id_alumnos=$id_alumno;
                    //$prestamo->marca=$request->select;
                    //$prestamo->s_n=$request->s_n;
                
                    $prestamo->estado="inactivo";
                    $prestamo->save();
                    
                }
            
           
         
        





        }
        
    }

