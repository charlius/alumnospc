@extends('adminlte::page')

@section('title', 'index')

@section('content_header')
    <h1>Alumnospc</h1>
@stop

@section('content')
    <p>Devolucion de {{$data->alumno_nombre}}</p>
   
    

  



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
    $('#listado').DataTable();
     console.log('Hi!'); </script>
@stop