@extends('layouts.app')
@section('contenido')
<div class="container-fluid">
    <div class="row justify-content-center">
        <!--Formulario para el edicion de un nuevo vacunado, se recibira una variable con todos los datos que se deben precargar-->
        <div class="col-10">
            <h3 class="mb-3 mt-3 text-center">Formulario edicion de nuevo vacunado</h3>
        </div>
    </div>
    <div>
        <form action="route('ingresarruta')" method=POST enctype="multipart/form-data">
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="name">Nombre</label>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control" value="{{$vacunado == NULL ? old('name') : $vacunado->name}}" id="name" name="name" required>
                    @error('Nombre')<small>*{{$message}}</small>@enderror
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="last_name">Apellido</label>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control" value="{{$vacunado == NULL ? old('last_name') : $vacunado->last_name}}" id="last_name" name="last_name" required>
                    @error('Apellido')<small>*{{$message}}</small>@enderror
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="date_of_birth">Fecha de nac</label>
                </div>
                <div class="col-8">
                    <input type="date" class="form-control" value="NULL" id="date_of_birth" placeholder="dd/mm/aaaa" name="date_of_birth" required>
                    @error('Fecha de nac')<small>*{{$message}}</small>@enderror
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="dni">DNI</label>
                </div>
                <div class="col-8">
                    <input type="number" class="form-control" value="{{$vacunado == NULL ? old('dni') : $vacunado->dni}}" id="dni" name="dni" required>
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
                        onclick="document.getElementById('comorbilidad').disabled = false;"
                        class="form-check-input" type="radio" name="comorbilidad" id="Si" value="Si">
                        <label class="form-check-label pr-3" for="si">Si</label>
                    </div>
                    <div class="form-check">
                        <input 
                        onclick="document.getElementById('comorbilidad').disabled = true;document.getElementById('comorbilidad').value = ''"
                        class="form-check-input" type="radio" name="comorbilidad" id="No" value="No" checked>
                        <label class="form-check-label" for="No">No</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="comorbilidad">Descripción</label>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control" value="{{$vacunado == NULL ? old('comorbilidad') : $vacunado->comorbilidad}}" placeholder="" id="comorbilidad" name="comorbilidad" disabled="disabled">
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="sex">Sexo</label>
                </div>
                <div class="col-8">
                    <select class="form-select">
                        <option selected>Seleccionar</option>
                        <option value="F">Femenino</option>
                        <option value="M">Masculino</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="date_of_vaccination">Fecha de vacunación</label>
                </div>
                <div class="col-8">
                    <input type="date" class="form-control" value="NULL" id="date_of_vaccination" placeholder="dd/mm/aaaa" name="date_of_vaccination" required>
                    @error('Fecha de vacunación')<small>*{{$message}}</small>@enderror
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="codigo">Código de vacuna</label>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control" value="{{$vacunado == NULL ? old('codigo') : $vacunado->codigo}}" id="codigo" name="codigo" required>
                    @error('Codigo')<small>*{{$message}}</small>@enderror
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                @csrf 
                @method('PUT')
                <div>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
                <div class="ml-3">
                    <button type="submit" class="btn btn-success">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection