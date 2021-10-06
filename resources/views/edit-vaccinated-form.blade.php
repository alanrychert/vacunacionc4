@extends('layouts.app')
@section('contenido')
<div class="container-fluid">
    <div class="row justify-content-center">
        <!--Formulario para el edicion de un nuevo vacunado, se recibira una variable con todos los datos que se deben precargar-->
        <div class="col-10">
            <h3 class="mb-3 mt-3 text-center">Formulario edicion de vacunado</h3>
        </div>
    </div>
    <div>
        <form action="{{route('vaccinated.update',$vaccinated->dni)}}" method=POST enctype="multipart/form-data">
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="name">Nombre</label>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control" value="{{$vaccinated == NULL ? old('name') : $vaccinated->name}}" id="name" name="name" required>
                    @error('Nombre')<small>*{{$message}}</small>@enderror
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="last_name">Apellido</label>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control" value="{{$vaccinated == NULL ? old('last_name') : $vaccinated->last_name}}" id="last_name" name="last_name" required>
                    @error('Apellido')<small>*{{$message}}</small>@enderror
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="date_of_birth">Fecha de nac</label>
                </div>
                <div class="col-8">
                    <input type="date" class="form-control" value="" id="date_of_birth" placeholder="dd/mm/aaaa" name="date_of_birth" required>
                    @error('Fecha de nac')<small>*{{$message}}</small>@enderror
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="dni">DNI</label>
                </div>
                <div class="col-8">
                    <input type="number" class="form-control" value="{{$vaccinated == NULL ? old('dni') : $vaccinated->dni}}" id="dni" name="dni" required>
                    @error('DNI')<small>*{{$message}}</small>@enderror
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="option">Comorbilidad</label>
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
                    <label class="form-label font-weight-bold" for="comorbidity">Descripción</label>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control" value="{{$vaccinated == NULL ? old('comorbidity') : $vaccinated->comorbidity}}" placeholder="" id="comorbidity" name="comorbidity" disabled="disabled">
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="sex">Sexo</label>
                </div>
                <div class="col-8">
                    <select name="sex" class="form-select">
                        @if($vaccinated->sex == 'F')
                            <option value="F" selected>Femenino</option>
                            <option value="M">Masculino</option>
                        @else
                            <option value="F">Femenino</option>
                            <option value="M" selected>Masculino</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="date_of_vaccination">Fecha de vacunación</label>
                </div>
                <div class="col-8">
                    <input type="date" class="form-control" value="" id="date_of_vaccination" placeholder="dd/mm/aaaa" name="date_of_vaccination" required>
                    @error('Fecha de vacunación')<small>*{{$message}}</small>@enderror
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="type">Tipo de vacuna</label>
                </div>
                <div class="col-8">
                    <select class="form-select" name="type_of_vaccine">
                        <!--esto vendria de la bdd?-->
                        <option selected>Seleccionar</option>
                        @foreach ($types as $type)
                        <option value="{{$type->type_code}}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>         
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="vaccine_number">Numero de serie de vacuna</label>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control" value="{{old('vaccine_number')}}" id="vaccine_number" name="vaccine_number" required>
                    @error('Numero de serie de vacuna')<small>*{{$message}}</small>@enderror
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                @csrf 
                @method('PUT')
                <div>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
                <div class="ml-3">
                    <a class="btn btn-success" href="{{ route('index')}}">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection