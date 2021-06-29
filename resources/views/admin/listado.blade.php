@extends('adminlte::page')

@section('title', 'index')

@section('content_header')
    <h1>Alumnospc</h1>
@stop

@section('content')
    <p>Listado de los registros de alumnos.</p>
    <table class="table" id="listado">
        <thead>
          <tr>
            <th scope="col">nombre</th>
            <th scope="col">rut</th>
            <th scope="col">descripcion</th>
            <th scope="col">asignacion</th>
            <th scope="col">prestamo</th>
            <th scope="col">opcion</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno)
            <tr>
                
                @foreach ($prestamos as $prestamo)
                    @if ($alumno->id_apoderados==$prestamo->id_apoderados)
                      <th >{{$alumno->nombre}}</th>
                      <td>{{$alumno->rut}}</td>
                      <td>{{$alumno->descripcion}}</td>
                      <td>{{$alumno->asignacion}}</td>
                      <td>{{$prestamo->estado}}</td>
                      @if ($prestamo->estado=="activo")
                        
                         <td><a href="{{ url('/admin/devolucion/'.$alumno->rut) }}" aria-disabled="true" class="btn btn-danger">Devolucion</a></td>
                      @else
                        <td><a href="{{ url('/admin/prestamo/'.$alumno->rut) }}" class="btn btn-success">Prestamo</a></td> 
                      @endif
                    @else
                        
                    @endif
                @endforeach
               
                 
                                 
              
                
              </tr>
            @endforeach
         
        </tbody>
      </table>

  



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
    $('#listado').DataTable();
     console.log('Hi!'); </script>
@stop