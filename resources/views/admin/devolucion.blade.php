@extends('adminlte::page')

@section('title', 'index')

@section('content_header')
    <h1>Alumnospc</h1>
@stop

@section('content')
    <p>Devolucion de {{$alumnos[0]->nombre}}.</p>
    <form action="{{route('pdf_devolucion')}}" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">nombre alumno</label>
          <div class="col-sm-10">
            <input type="text" name="alumno_nombre" class="form-control" id="inputEmail3"  value="{{$alumnos[0]->nombre}}">
          </div>
        </div>

        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">rut alumno</label>
          <div class="col-sm-10">
            <input type="text" name="alumno_rut" class="form-control" id="inputPassword3"  value="{{$alumnos[0]->rut}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">nombre apoderado</label>
          <div class="col-sm-10">
            <input type="text" name="apoderado_nombre" class="form-control" id="inputEmail3"  value="{{$apoderados[0]->nombre_apo}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">rut apoderado</label>
          <div class="col-sm-10">
            <input type="text" name="apoderado_rut" class="form-control" id="inputEmail3"  value="{{$apoderados[0]->rut_apo}}">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">telefono </label>
          <div class="col-sm-10">
            <input type="number" name="apoderado_telefono" class="form-control"  id="inputEmail3" value="{{$apoderados[0]->telefono_apo}}">
          </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Comentario </label>
            <textarea class="form-control" name="comentario" id="exampleFormControlTextarea1" rows="3"></textarea>
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
            
           
            
            <button id="btn" type="submit" class="btnguardar btn btn-success">guardar y generar</button>
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
          let button = document.querySelector(".btnguardar");
          button.disabled = true;
         $("#btn").click(function () {
            if( $('#cbx1').prop('checked') ) {
            }else{
                alert("confirma primero");
                window.stop()
            }
            
         });
        
                
                
                
          
         $("#cbx1").click(function() {
            if ($(this).is(":checked")){
               alert("confirmastes los datos!");
               let button = document.querySelector(".btnguardar");
              button.disabled = false;
            } else {
                
                let button = document.querySelector(".btnguardar");
              button.disabled = true;
            }
          });
        });
    $('#listado').DataTable();
     console.log('Hi!'); </script>
@stop