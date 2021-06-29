<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"/>

    <title>Document</title>
</head>
<body>


    <div class="container">
        <div class="row text-black text-center">
           
            <div class="  border"><p>Departametno de Informatica</p><p>C.C.LINARES.</p></div>
        </div>
    
        <div class="row text-black text-center">
            <div class="border border-secondary">Responsable de entrega.</div>
        </div>
        <div class="three-columns"   style='text-align: justify;'>
            <p><small>
                <b>FECHA:</b> {{$fecha_actual}} 
                @for ($i = 0; $i <12; $i++)
                     &nbsp; 
                @endfor
                <b>HORA:</b> {{$hora}}                  
               
            </small></p>
            <p><small>
                <b>NOMBRE ALUMNO:</b> {{$alumnos[0]->nombre}} 
                @for ($i = 0; $i <8; $i++)
                &nbsp; 
                @endfor
                <b>CURSO:</b> {{$alumnos[0]->curso}}
            </small></p>
            <p><small>
                <b>APODERADO:</b> {{$asignacion[0]->nombre_apo}} 
                @for ($i = 0; $i <8; $i++)
                &nbsp; 
                @endfor
                <b>RUT:</b> {{$asignacion[0]->rut_apo}}
            </small></p>
            <p><small>
                <b>TELEFONO:</b> {{$asignacion[0]->telefono_apo}}
                @for ($i = 0; $i <12; $i++)
                &nbsp; 
                @endfor
               
            </small></p>
            <br>
            <div class="row text-black text-center">
                <div class="border border-secondary">Detalle.</div>
               
            </div>
            <p>{{$detalle}}</p>

            <br>
        <br>
        <br>
            <div>
                <img src="{{ asset('images/firma.png') }}"> 
                <p> _________________
                    @for ($i = 0; $i <12; $i++)
                    &nbsp; 
                    @endfor
                    _________________
                </p>
                <p><small>Carlos bascur informatico
                    @for ($i = 0; $i <18; $i++)
                    &nbsp; 
                    @endfor
                    firma responsable</small><p>
            </div>



</body>
</html>