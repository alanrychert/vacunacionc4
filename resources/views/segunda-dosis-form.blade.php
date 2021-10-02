@extends('layouts.app')
@section('contenido')
<div class="container-fluid">
    <div class="row justify-content-center">
        <!--Formulario para el registro de un nuevo vacunado-->
        <div class="col-10">
            <h3 class="mb-3 mt-3">Formulario segunda dosis</h3>
        </div>
    </div>
    <div>
        <form action="route('ingresarruta')" method=POST enctype="multipart/form-data">
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="dni">DNI</label>
                </div>
                <div class="col-8">
                    <input type="number" class="form-control" value="{{old('dni')}}" id="dni" name="dni" required>
                    @error('DNI')<small>*{{$message}}</small>@enderror
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="fecha_nac">Fecha de nac</label>
                </div>
                <div class="col-8">
                    <input type="date" class="form-control" value="NULL" id="fecha_nac" placeholder="dd/mm/aaaa" name="fecha_nac" required>
                    @error('Fecha de nac')<small>*{{$message}}</small>@enderror
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="codigo">Código de vacuna</label>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control" value="{{old('codigo')}}" id="codigo" name="codigo" required>
                    @error('Nombre')<small>*{{$message}}</small>@enderror
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                @csrf 
                @method('POST')
                <div class="m-3">
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
                <div class="m-3">
                    <button type="submit" class="btn btn-success">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection