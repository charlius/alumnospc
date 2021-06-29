
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"/>
    <title>Document</title>
    <style>
        .three-columns {
        
        -webkit-column-count: 3; /* Chrome, Safari, Opera */
        -moz-column-count: 3; /* Firefox */
        column-count: 3;
        
        -webkit-column-gap: 20px; /* Chrome, Safari, Opera */
        -moz-column-gap: 20px; /* Firefox */
        column-gap: 20px;
        
        -webkit-column-gap: 2rem; /* Chrome, Safari, Opera */
        -moz-column-gap: 2rem; /* Firefox */
        column-gap: 2rem;
        
        -webkit-column-rule: 5px solid rgb(75, 180, 149)  ; /* Chrome, Safari, Opera */
        -moz-column-rule: 5px solid rgb(75, 180, 149)  ; /* Firefox */
        column-rule: 5px solid rgb(75, 180, 149)  ;
        
        -webkit-column-rule: 0.5rem solid rgb(75, 180, 149)  ; /* Chrome, Safari, Opera */
        -moz-column-rule: 0.5rem solid rgb(75, 180, 149)  ; /* Firefox */
        column-rule: 0.5rem solid rgb(75, 180, 149)  ;
        
        margin: 20px;
        margin: 2rem;
    
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="row text-black text-center">
           
            <div class="  border"><p>Departametno de Informatica</p><p>C.C.LINARES.</p></div>
        </div>
    
        <div class="row text-black text-center">
            <div class="border border-secondary">Destinario responsable.</div>
        </div>
        <div class="three-columns">
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
                <div class="border border-secondary">producto entregado.</div>
            </div>
            <div>
                <p>
                    <b>marca:</b> {{$marca}} 
                    @for ($i = 0; $i <12; $i++)
                    &nbsp; 
                    @endfor
                    <b>S/N:</b>{{$s_n}}
                </p>
                <p>
                    <b>cantidad:</b> 1 
                    @for ($i = 0; $i <12; $i++)
                    &nbsp; 
                    @endfor
                    <b>estado:</b> operativo
                </p>
            </div>

            
            <div class="row text-black text-center">
                <div class="  border">Observaciones.</div>
            </div>
            <p class=" text-black  border">
                <small>El usuario que requiera un producto y/o sus accesorios para el préstamo de este, deberá firmar obligatoriamente este documento, teniendo en cuenta que el o la apoderado(a) percibe el producto operativo y en condiciones de funcionar perfectamente, el usuario deberá reconocer la responsabilidad económica a través de la firma de un pagaré si pierde o daña el equipo y todos sus componentes que lo integran. Así como también si corta, elimina o daña los contenidos digitales almacenados en el dispositivo. Para estos casos el usuario será moroso hasta que reponga o reembolse el valor del dispositivo y no se contemplarán situaciones de excepción por situación socioeconómica.</small>
               
            </p>
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
      
            <center><h3>Pagare</h3></center>
            <div style='text-align: justify;'>
            <p >Don(ña) {{$asignacion[0]->nombre_apo}} domiciliado en ___________________________________ de la Comuna de ________________  en adelante el deudor, declara adeudar y se obliga a pagar a la Corporación Educacional Colegio Concepción, RUT 71.659.500-5 domiciliada en Linares, General Cristo Nº 0571 la suma de 20 Unidades de Fomento, liquidadas éstas a la época del vencimiento, en la forma que en adelante se expresa:

                La deuda será pagada en el domicilio de la acreedora en dinero efectivo, vale vista bancario o cheque de esta plaza, el día 31 de julio de 2021, si éste recayera en sábado, domingo o festivo, el pago se prorroga al día hábil siguiente. 
                En caso de mora o simple retardo en el pago antes indicado, la deuda que consta en este pagaré se considerará de plazo vencido, haciéndose exigible el total de lo adeudado y devengándose en este caso el máximo de interés convencional para operaciones no reajustables vigentes a la fecha o época de la mora o retardo, libreando el deudor al acreedor del protesto de la misma.  El interés moratorio se aplicará sobre el total del saldo adeudado, desde la mora o simple retardo y hasta la fecha de su pago efectivo.
                En caso de cobro judicial corresponderá al deudor acreditar el pago de las cuotas de servicio de este pagaré.
                Todos los gastos de otorgamiento de este instrumento serán de cargo del deudor.
                El acreedor queda liberado de la obligación de protesto.
                Las partes fijan como domicilio para todos los efectos del presente pagaré la ciudad de Linares prorrogando competencia para ante sus Tribunales.
                Todas las obligaciones emanadas del presente pagaré tienen el carácter de indivisible para todos los efectos legales.
            </p>
            </div>
            <br>
            <p>_____________________________</p> 
            <p><small>    DEUDOR
                RUT: {{$asignacion[0]->rut_apo}}</small></p>
                <p><small>
                    
                Linares,{{$fecha_actual}}</p>
                <p><small>
                Autorizo la firma del deudor don ___________________________________________
                </small></p>
                <p><small>Cédula nacional de identidad Nº ____________________________________________
                </small></p>
                           
            
        </div>
    </div>

</body>


</html>