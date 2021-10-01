@extends('layouts.app')
@section('contenido')
<div class="container-fluid bg-gray-100">
    <div class="row justify-content-center">
        <!--Formulario para el registro de un nuevo vacunado-->
        <div class="col-8">
            <h2>Formulario de nuevo vacunado</h2>
        </div>
    </div>
    <div>
        <form action="route('ingresarruta')" method=POST enctype="multipart/form-data">
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="nombre">Nombre</label>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control" value="{{old('nombre')}}" id="nombre" name="nombre" required>
                    @error('Nombre')<small>*{{$message}}</small>@enderror
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="apellido">Apellido</label>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control" value="{{old('apellido')}}" id="apellido" name="apellido" required>
                    @error('Apellido')<small>*{{$message}}</small>@enderror
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
                    <label class="form-label font-weight-bold" for="dni">DNI</label>
                </div>
                <div class="col-8">
                    <input type="number" class="form-control" value="{{old('dni')}}" id="dni" name="dni" required>
                    @error('DNI')<small>*{{$message}}</small>@enderror
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="dni">Comorbilidad</label>
                </div>
                <div class="col-8" style="display:inline-flex">
                    <div class="form-check ">
                        <input 
                        onclick="document.getElementById('descripcion').disabled = false;"
                        class="form-check-input" type="radio" name="comorbilidad" id="Si" value="Si">
                        <label class="form-check-label pr-3" for="si">Si</label>
                    </div>
                    <div class="form-check">
                        <input 
                        onclick="document.getElementById('descripcion').disabled = true;"
                        class="form-check-input" type="radio" name="comorbilidad" id="No" value="No" checked>
                        <label class="form-check-label" for="No">No</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="descripcion">Descripción</label>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control" value="{{old('descripcion')}}" placeholder="" id="descripcion" name="descripcion" disabled="disabled">
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="nombre">Sexo</label>
                </div>
                <div class="col-8">
                    <select class="form-select">
                        <option selected>Elija una opcion</option>
                        <option value="F">Femenino</option>
                        <option value="M">Masculino</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="fecha_vac">Fecha de vacunacion</label>
                </div>
                <div class="col-8">
                    <input type="date" class="form-control" value="NULL" id="fecha_vac" placeholder="dd/mm/aaaa" name="fecha_vac" required>
                    @error('Fecha de vacunacion')<small>*{{$message}}</small>@enderror
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