@extends('layouts.app')
@section('contenido')
<div class="container-fluid">
    <div class="row justify-content-center">
        <!--Formulario para carga de un nuevo lote-->
        <div class="col-10">
            <h3 class="mb-3 mt-3 text-center">Formulario de nuevo lote</h3>
        </div>
    </div>
    <div>
        <form action="{{ route('batch.store') }}" method="POST" enctype="multipart/form-data">
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold">Numero de lote</label>
                </div>
                <div class="col-8">
                    <input type="number" class="form-control" value="{{old('batch_number')}}" id="batch_number" name="batch_number" required>
                    @error('Numero de lote')<small>*{{$message}}</small>@enderror
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="range">Rango</label>
                </div>
                <div class="col-8">
                    <label class="form-label font-weight-bold" for="since">Desde</label>
                    <input type="number" class="form-control mb-3" value="{{old('since')}}" id="since" name="since" required>
                    <label class="form-label font-weight-bold" for="to">Hasta</label>
                    <input type="number" class="form-control" value="{{old('to')}}" id="to" name="to" required>
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="tipo">Tipo de vacuna</label>
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
                    <label class="form-label font-weight-bold" for="dosis">Dosis</label>
                </div>
                <div class="col-8">
                    <select class="form-select" name="dose">
                        <option selected>Seleccionar</option>
                        <option value="1">Primera dosis</option>
                        <option value="2">Segunda dosis</option>
                        <option value="3">Refuerzo</option>
                    </select>
                </div>
            </div>                    
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="reception_date">Fecha de recepción</label>
                </div>
                <div class="col-8">
                    <input type="date" class="form-control" id="reception_date" placeholder="dd/mm/aaaa" name="reception_date" required>
                    @error('Fecha de recepción')<small>*{{$message}}</small>@enderror
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