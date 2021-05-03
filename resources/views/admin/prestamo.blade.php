@extends('adminlte::page')

@section('title', 'index')

@section('content_header')
    <h1>Alumnospc</h1>
@stop

@section('content')
    <p>prestamo de pc numero {{$alumno->id}}.</p>
    <form>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">nombre</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" value="{{$alumno->nombre}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">rut</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword3" value="{{$alumno->rut}}">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-2">confimar</div>
          <div class="col-sm-10">
            <div class="form-check">
          <label class="form-check-label">
            <input id="cbx1" class="form-check-input" type="checkbox"> genera el documento antes de confirmar
          </label>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="button" class="btn btn-primary">generar documento</button>
            <button id="btn" type="submit" class="btn btn-success">guardar</button>
          </div>
        </div>
      </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
    
        $(document).ready(function() {
         $("#btn").click(function () {
            if( $('#cbx1').prop('checked') ) {
            }else{
                alert("confirma primero");
                window.stop()
            }
            
         });
         $("#cbx1").click(function() {
            if ($(this).is(":checked")){
               alert("selecionado"); // Función si se checkea
            } else {
                doNotChecked(); //Función si no
            }
          });
        });
     </script>

@stop