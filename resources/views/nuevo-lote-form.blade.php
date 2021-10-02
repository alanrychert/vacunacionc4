@extends('layouts.app')
@section('contenido')
<div class="container-fluid">
    <div class="row justify-content-center">
        <!--Formulario para el registro de un nuevo vacunado-->
        <div class="col-10">
            <h3 class="mb-3 mt-3">Formulario de nuevo lote</h3>
        </div>
    </div>
    <div>
        <form action="route('ingresarruta')" method=POST enctype="multipart/form-data">
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="codigo">Código</label>
                </div>
                <div class="col-8">
                    <input type="text" class="form-control" value="{{old('codigo')}}" id="codigo" name="codigo" required>
                    @error('Codigo')<small>*{{$message}}</small>@enderror
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <!--validar que sea un entero positivo-->
                    <label class="form-label font-weight-bold" for="cantidad">Cantidad de vacunas</label>
                </div>
                <div class="col-8">
                    <input type="number" class="form-control" value="{{old('cantidad')}}" id="cantidad" name="cantidad" required>
                    @error('Cantidad de vacunas')<small>*{{$message}}</small>@enderror
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="tipo">Tipo de vacuna</label>
                </div>
                <div class="col-8">
                    <select class="form-select">
                        <!--esto vendria de la bdd?-->
                        <option selected>Seleccionar</option>
                        <option value="Sinopharm">Sinopharm</option>
                        <option value="Astrazeneca">Astrazeneca</option>
                        <option value="Pfizer">Pfizer</option>
                    </select>
                </div>
            </div>          
            <div class="row mb-3 justify-content-center">
                <div class="col-2">
                    <label class="form-label font-weight-bold" for="fecha_rec">Fecha de recepción</label>
                </div>
                <div class="col-8">
                    <input type="date" class="form-control" value="NULL" id="fecha_rec" placeholder="dd/mm/aaaa" name="fecha_rec" required>
                    @error('Fecha de recepción')<small>*{{$message}}</small>@enderror
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