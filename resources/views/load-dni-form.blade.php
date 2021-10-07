@extends('layouts.app')
@section('contenido')
<div class="container-fluid">
    <div class="row justify-content-center">
        <!--Formulario para el registro de un nuevo vacunado-->
        <div class="col-10">
            <h3 class="mb-3 mt-3 text-center">Formulario de Vacunacion</h3>
        </div>
        <div class="col-10">
            <h5 class="mb-3 mt-3 text-center">Por favor Ingrese el DNI del vacunado</h5>
        </div>
    </div>
    <div>
        
        <form action="{{ route('vaccinated.form') }}" method="POST" enctype="multipart/form-data">
            
            <div class="row mb-3 justify-content-center">
               
                <div class="col-8">
                    <input type="number" class="form-control" value="{{old('dni')}}" id="dni" name="dni" required>
                    @error('DNI')<small>*{{$message}}</small>@enderror
                </div>
            </div>
            
            @csrf 
            @method('POST')
            <div class="row mb-3 justify-content-center">
                <div>
                    <button type="submit" class="btn btn-dark">Guardar</button>
                </div>
                <div class="ml-3">
                    <a class="btn btn-dark" href="{{ route('index')}}">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection