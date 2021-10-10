@extends('layouts.app')
@section('contenido')
<!--Esto se incrusta en un form-->
<div class="container-fluid">
    <div class="row justify-content-center">
        <!--Formulario para el registro de un nuevo vacunado-->
        <div class="col-10">
            <h3 class="mb-3 mt-3 text-center">{{$header}}</h3>
        </div>
    </div>
    <div>
    <form action="{{ route('vaccinated.store') }}" method="POST" enctype="multipart/form-data">
        <div class="row mb-3 justify-content-center">
            <div class="col-2">
                <label class="form-label font-weight-bold" for="dni">DNI</label>
            </div>
            <div class="col-8">
                <input readonly type="number" class="form-control" value="{{$dni}}" id="dni" name="dni" required>
                @error('DNI')<small>*{{$message}}</small>@enderror
            </div>
        </div>

        @yield('contenido2')
        
        <input type="hidden" class="form-control" value="{{$formtype}}" id="formtype" name="formtype">

       
        <div class="row mb-3 justify-content-center">
                        <div class="col-2">
                            <label class="form-label font-weight-bold" for="date_of_vaccination">Fecha de vacunación</label>
                        </div>
                        <div class="col-8">
                            <input type="date" class="form-control" id="date_of_vaccination" dateFormat="dd-MM-yyyy" placeholder="dd/mm/aaaa" name="date_of_vaccination" required>
                            @error('Fecha de vacunación')<small>*{{$message}}</small>@enderror
                        </div>
        </div> 

        <div class="row mb-3 justify-content-center">
            <div class="col-2">
                <label class="form-label font-weight-bold" for="type">Tipo de vacuna</label>
            </div>
            <div class="col-8">
                <select onchange="getBatches(this.value)" class="form-select" name="type_of_vaccine">
                    <option selected>Seleccionar</option>
                    @foreach ($types as $type)
                    <option value="{{$type->type_code}}">{{ $type->name }}</option>
                    @endforeach
                </select>
                @error('Tipo de vacuna')<small>*{{$message}}</small>@enderror
            </div>
        </div>      
        <div class="row mb-3 justify-content-center">
            <div class="col-2">
                <b><p>Numero de lote</p></b>
            </div>

            <div class="col-8">
                <input onchange="getVaccines(this.value)" type="number" class="typeahead" 
                    data-provide="typeahead" name="batch_number" id="batch_number"/>
            </div>
        </div>

        <div class="row mb-3 justify-content-center">
            <div class="col-2">
                <b><p>Numero de vacuna</p></b>
            </div>

            <div class="col-8">
                <input type="number" class="typeahead" 
                data-provide="typeahead" name="vaccine_number" id="vaccine_number"/>
            </div>
        </div>
        

        <div class="row mb-3 justify-content-center">
            @csrf 
            @method('POST')
            <div>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
            <div class="ml-3">
                <a class="btn btn-dark" href="{{ route('index')}}">Cancelar</a>
            </div>
        </div>
    </div>
</div>

 
<script>
    let batches_array = [];
    let vaccines_array = [];
    function getBatches(value){
        const token = $('input[name="_token"]').val();
        $.ajax({
            url:"{{ route('batch.getAvailableBatches') }}",
            method: "POST",
            data: {type_of_vaccine_id: value, _token: token},
            success: 
                function(data){
                    data.forEach(batch => {
                        batches_array.push(batch.batch_number.toString());
                    })
                }
        })
    }
    function getVaccines(value){
        console.log(value);
        const token = $('input[name="_token"]').val();
        $.ajax({
            url:"{{ route('batch.getAvailableVaccines') }}",
            method: "POST",
            data: {batch_number: value, _token: token},
            success: 
                function(data){
                    data.forEach(vaccine => {
                        console.log(vaccine);
                        vaccines_array.push(vaccine.vaccine_number.toString());
                    })
                }
        })
    }

    // Initializes  input
    // with a typeahead
    var $input = $('#batch_number');
    $input.typeahead({
        source: batches_array,
        autoSelect: true,
    });

    $input.change(function () {
        var current = $input.typeahead("getActive");
        matches = [];

        if (current) {
            // Some item from your input matches
            // with entered data
            if (current.name == $input.val()) {
                matches.push(current.name);
            }
        }
    });

    var $vaccines = $('#vaccine_number');
    $vaccines.typeahead({
        source: vaccines_array,
        autoSelect: true,
    });

    $vaccines.change(function () {
        var current = $vaccines.typeahead("getActive");
        matches = [];

        if (current) {
            // Some item from your input matches
            // with entered data
            if (current.name == $vaccines.val()) {
                matches.push(current.name);
            }
        }
    });
  </script>
@endsection