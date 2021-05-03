@extends('adminlte::page')

@section('title', 'index')

@section('content_header')
    <h1>Alumnospc</h1>
@stop

@section('content')

<div class="flex-center position-ref full-height">
     
    <div class="container mt-5">
        <h3>Importar alumnos</h3>
 
       
        <form action="{{route('import')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            @if(Session::has('message'))
                @section('js')
                        <script type="text/javascript">
                            Swal.fire(
                            'atencion',
                            'Importacion creada revise el listado de registros',
                            'success'
                            ) 
                    </script>
                    @endsection
            
            @else
            <h4>Atencion! solo se subiran los alumnos con selecion 'SI'</h4>
            @endif

            <div class="row">
                <div class="col-3">
                    <div class="custom-file">
                        <input type="file" name="file" >
                        
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Importar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
 
    <script>
        function atencion() {
            Swal.fire(
            'atencion',
            'se importaran solo alumnos con "SI" en la seleccion!',
            'success'
            ) 
        }
        
    </script>
@stop
