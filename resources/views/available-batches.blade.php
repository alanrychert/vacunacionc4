@extends('layouts.app')
@section('contenido')
<div class="container-fluid col-8">
    <div class="row">
        <div class="col-8 mb-3">
            <select onchange="myFunction(1,this.value)" id="type" name="type" class="form-select block appearance-none mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option selected>Seleccionar tipo de vacuna</option>
                @foreach($types as $type)
                <option value="{{$type->name}}">{{$type->name}}</option>
                @endforeach
            </select>   
        </div>
    </div>
    <table id="myTable" class="table">
        <thead>
            <tr>
                <th scope="col">Numero de Lote</th>
                <th scope="col">Tipo de Vacuna</th>
                <th scope="col">Dosis</th>
                <th scope="col">Rango</th>
                <th scope="col">Fecha de recepcion</th>
            </tr>
        </thead>
        <tbody>
            @forelse($batches as $batch)
            <tr>
                <td>{{$batch->batch_number}}</td>
                <td>{{$batch->name}}</td>
                <td>{{$batch->dose}}</td>
                <td>{{$batch->since}} - {{$batch->to}}</td>
                <td>{{$batch->reception_date}}</td>
            </tr>
            @empty
                <h1 class="h1"> No hay ningún lote</h1>
            @endforelse
        <tbody>
    </table>
</div>

<script>
    function myFunction(j,value) {
        console.log(value);
        var input, filter, table, tr, td, i, txtValue;
        filter = value.toUpperCase();
        table = document.getElementById("myTable");
        tbody = table.getElementsByTagName("tbody");
        tr = tbody[0].getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[j];
            if (!td) {
            return 
            }
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase() == filter) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
</script>
@endsection

