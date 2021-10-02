@extends('layouts.app')
@section('contenido')
<div class="container-fluid">
    <div class="row justify-content-center">
        <!--Formulario para el registro de vacunacion-->
        <div class="col-10">
            <h3 class="mb-3 mt-3 text-center">Formulario vacunacion</h3>
        </div>
    </div>
    <div class="row mb-3 justify-content-center">
        <div class="col-2 text-center">
            <label class="form-label font-weight-bold" for="dosis">Dosis</label>
        </div>
        <div class="col-2">
            <select class="form-select">
                <option selected>Seleccionar</option>
                <option value="1">1era</option>
                <option value="2">2da</option>
                <optien value="R">Refuerzo</option>
            </select>
        </div>
    </div>
    <div class="row mb-3 justify-content-center">
        @csrf 
        @method('POST')
        <div>
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
        <div class="ml-3">
            <button type="submit" class="btn btn-success">Cancelar</button>
        </div>
    </div>
</div>
@endsection