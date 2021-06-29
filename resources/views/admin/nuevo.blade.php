@extends('adminlte::page')

@section('title', 'index')

@section('content_header')
    <h1>Alumnospc</h1>
@stop

@section('content')
@if($mensaje=='mensaje')
                @section('js')
                        <script type="text/javascript">
                            Swal.fire(
                            'atencion',
                            'se guardo con exito el registro',
                            'success'
                            ) 
                    </script>
                    @endsection
            
            @else
            @section('js')
             
        @endsection
            @endif
<form action="{{route('crear')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <center><h4>datos alumno</h4></center>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">nombre alumno</label>
      <div class="col-sm-10">
        <input type="text" name="nombre_alumno" class="form-control" id="txtSoloLetras"  value="">
      </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">curso</label>
        <div class="col-sm-10">
          <input type="text" name="curso_alumno"class="form-control" id="inputEmail3"  value="">
        </div>
      </div>

    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-2 col-form-label">rut alumno</label>
      <div class="col-sm-10">
        <input type="text" name="rut_alumno" class="form-control" id="inputPassword3"  value="">
      </div>
    </div>

    <center><h4>datos apoderado</h4></center>

    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">nombre apoderado</label>
      <div class="col-sm-10">
        <input type="text" name="nombre_apoderado" class="form-control" id="txtSoloLetras"  value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">rut apoderado</label>
      <div class="col-sm-10">
        <input type="text" name="rut_apoderado" class="form-control" id="inputEmail3"  value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">telefono apoderado </label>
      <div class="col-sm-10">
        <input type="number" name="telefono_apoderado" class="form-control" id="inputEmail3" value="">
      </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">correo  apoderado </label>
        <div class="col-sm-10">
          <input type="email" name="correo_apoderado" class="form-control" id="inputEmail3" value="">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">descripcion </label>
        <div class="col-sm-10">
            <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
      </div>

    
    <div class="form-group row">
      <div class="col-sm-10">
        
        
        <center><button id="btn" type="submit" class="btn btn-success">guardar</button></center>
      </div>
    </div>
  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); 
    
    function validarTextoEntrada(input, patron) {
    var texto = input.value
    var letras = texto.split("")
    for (var x in letras) {
        var letra = letras[x]
        if (!(new RegExp(patron, "i")).test(letra)) {
            letras[x] = ""
        }
    }
    input.value = letras.join("")
}

      var txtSoloLetras = document.getElementById("txtSoloLetras")
      txtSoloLetras.addEventListener("input", function (event) {
          validarTextoEntrada(this, "[a-z ]")
      })

      var txtPersonalizado = document.getElementById("txtPersonalizado")
      txtPersonalizado.addEventListener("input", function (event) {
          validarTextoEntrada(this, "[0-9K-k]")
      })

    
    </script>

    
@stop