@extends('adminlte::page')

@section('title', 'index')

@section('content_header')
    <h1>Alumnospc</h1>
@stop

@section('content')
    <p>prestamo de pc numero {{$alumnos[0]->id}}.</p>

    <form action="{{route('pdf')}}" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">nombre alumno</label>
        <div class="col-sm-10">
          <input type="text" name="alumno_nombre" class="form-control" id="txtSoloLetras"  value="{{$alumnos[0]->nombre}}">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">rut alumno</label>
        <div class="col-sm-10">
          <input type="text" name="alumno_rut" class="form-control" id="txtPersonalizado"  value="{{$alumnos[0]->rut}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">nombre apoderado</label>
        <div class="col-sm-10">
          <input type="text" name="apoderado_nombre" class="form-control" id="txtSoloLetras"  value="{{$apoderados[0]->nombre_apo}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">rut apoderado</label>
        <div class="col-sm-10">
          <input type="text" name="apoderado_rut" class="form-control" id="txtPersonalizado"  value="{{$apoderados[0]->rut_apo}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">telefono </label>
        <div class="col-sm-10">
          <input type="number" name="apoderado_telefono" class="form-control"  id="inputEmail3" value="{{$apoderados[0]->telefono_apo}}">
        </div>
      </div>
      <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">S/N :</label>
          <input class="form-control" name="s_n" id="exampleFormControlTextarea1" rows="3">
      </div>

      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">seleciona marca PC </label>
        <select name="select">
         
          <option value="hp" >hp</option>
          <option value="dell">dell</option>
        </select>
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
  <script type="text/javascript">
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

    function ShowSelected()
    {
    /* Para obtener el valor */
    var cod = document.getElementById("producto").value;
    alert(cod);
    
    /* Para obtener el texto */
    var combo = document.getElementById("producto");
    var selected = combo.options[combo.selectedIndex].text;
    alert(selected);
    }

    </script>
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
     </script>

@stop