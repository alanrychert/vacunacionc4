@extends('layouts.app')
@section('contenido')
<div class="container-fluid col-8">
    <div class="row">
        <div class="col-8 mb-3">
            <select onchange="myFunction(4,this.value)" id="province" name="province" class="form-select block appearance-none mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @foreach($provinces as $province)
                <option value="{{$province->name}}">{{$province->name}}</option>
                @endforeach
            </select>   
    </div>
    <table id="myTable" class="table">
        <thead>
            <tr>
                <th scope="col">Número de vacuna</th>
                <th scope="col">Número de lote</th>
                <th scope="col">Fecha de aplicación</th>
                <th scope="col">Dosis</th>
                <th scope="col">Provincia</th>
            </tr>
        </thead>
        <tbody>
            @forelse($vaccines as $vaccine)
            <tr>
                <td scope="row">{{$vaccine->vaccine_number}}</td>
                <td scope="row">{{$vaccine->batch_number}}</td>
                <td scope="row">{{$vaccine->date_of_vaccination}}</td>
                <td scope="row">{{$vaccine->dose}}</td>
                <td scope="row">{{$vaccine->name}}</td>
            </tr>
            @empty
                <h1 class="h1"> No hay ningún vacunado</h1>
            @endforelse
        <tbody>
    </table>
</div>
@endsection

<script>
    function myFunction(j,value) {
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