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
            <th scope="col">clave</th>
            <th scope="col">selecionado</th>
            <th scope="col">opcion</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno)
            <tr>
                <th >{{$alumno->nombre}}</th>
                <td>{{$alumno->rut}}</td>
                <td>{{$alumno->clave}}</td>
                <td>{{$alumno->selecionado}}</td>
                <td><a href="{{ url('/admin/prestamo/'.$alumno->id) }}" class="btn btn-success">Prestamo</a><button type="button" class="btn btn-danger">recepcion</button></td>
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