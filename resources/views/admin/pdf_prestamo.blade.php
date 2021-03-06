
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
                <small>El usuario que requiera un producto y/o sus accesorios para el pr??stamo de este, deber?? firmar obligatoriamente este documento, teniendo en cuenta que el o la apoderado(a) percibe el producto operativo y en condiciones de funcionar perfectamente, el usuario deber?? reconocer la responsabilidad econ??mica a trav??s de la firma de un pagar?? si pierde o da??a el equipo y todos sus componentes que lo integran. As?? como tambi??n si corta, elimina o da??a los contenidos digitales almacenados en el dispositivo. Para estos casos el usuario ser?? moroso hasta que reponga o reembolse el valor del dispositivo y no se contemplar??n situaciones de excepci??n por situaci??n socioecon??mica.</small>
               
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
            <p >Don(??a) {{$asignacion[0]->nombre_apo}} domiciliado en ___________________________________ de la Comuna de ________________  en adelante el deudor, declara adeudar y se obliga a pagar a la Corporaci??n Educacional Colegio Concepci??n, RUT 71.659.500-5 domiciliada en Linares, General Cristo N?? 0571 la suma de 20 Unidades de Fomento, liquidadas ??stas a la ??poca del vencimiento, en la forma que en adelante se expresa:

                La deuda ser?? pagada en el domicilio de la acreedora en dinero efectivo, vale vista bancario o cheque de esta plaza, el d??a 31 de julio de 2021, si ??ste recayera en s??bado, domingo o festivo, el pago se prorroga al d??a h??bil siguiente. 
                En caso de mora o simple retardo en el pago antes indicado, la deuda que consta en este pagar?? se considerar?? de plazo vencido, haci??ndose exigible el total de lo adeudado y deveng??ndose en este caso el m??ximo de inter??s convencional para operaciones no reajustables vigentes a la fecha o ??poca de la mora o retardo, libreando el deudor al acreedor del protesto de la misma.  El inter??s moratorio se aplicar?? sobre el total del saldo adeudado, desde la mora o simple retardo y hasta la fecha de su pago efectivo.
                En caso de cobro judicial corresponder?? al deudor acreditar el pago de las cuotas de servicio de este pagar??.
                Todos los gastos de otorgamiento de este instrumento ser??n de cargo del deudor.
                El acreedor queda liberado de la obligaci??n de protesto.
                Las partes fijan como domicilio para todos los efectos del presente pagar?? la ciudad de Linares prorrogando competencia para ante sus Tribunales.
                Todas las obligaciones emanadas del presente pagar?? tienen el car??cter de indivisible para todos los efectos legales.
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
                <p><small>C??dula nacional de identidad N?? ____________________________________________
                </small></p>
                           
            
        </div>
    </div>

</body>


</html>