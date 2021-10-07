@extends('layouts.app')
@section('contenido')
<!--Esto se incrusta en un form-->
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
<div>
    <b><p>Numero de lote</p></b>

    <input type="number" class="typeahead" 
        data-provide="typeahead"/>
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

 
<script>

function myFunction(value){
            const token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{ route('vaccine.getBatches') }}",
                method: "POST",
                data: {province_id: value, _token: token},
                success: 
                    function(data){
                        data.forEach(option => {
                            const myOption = $("<option>");
                            myOption.val(option.sanitary_region_id);
                            myOption.text(option.name);
                            $('#sanitary_region').append(myOption);
                        })
                    }
            })
        }
    // Initializes  input( name of states)
    // with a typeahead
    var $input = $(".typeahead");
    $input.typeahead({
        source: [
            "Andhra Pradesh",
            "Arunachal Pradesh",
            "Assam",
            "Bihar",
            "Chhattisgarh",
            "Goa",
            "Gujarat",
            "Haryana",
            "Himachal Pradesh",
            "Jharkhand",
            "Karnataka",
            "Kerala",
            "Madhya Pradesh",
            "Maharashtra",
            "Manipur",
            "Meghalaya",
            "Mizoram",
            "Nagaland",
            "Odisha",
            "Punjab",
            "Rajasthan",
            "Sikkim",
            "Tamil Nadu",
            "Telangana",
            "Tripura",
            "Uttar Pradesh",
            "Uttarakhand",
            "West Bengal",
        ],
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
  </script>
@endsection