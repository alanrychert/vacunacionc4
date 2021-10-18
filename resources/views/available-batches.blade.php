@extends('layouts.app')
@section('contenido')
<div class="container-fluid col-8">
    <div class="row">
            <div class="col">
                <input type="text" id="myInput" onkeyup="myFunction(0)" class="form-control" placeholder="Filtrar por nombre">
            </div>
        <br>
        <br>
    </div>
    <table id="myTable" class="table">
        <thead>
            <tr>
                <th scope="col">Numero de Lote</th>
                <th scope="col">Tipo de Vacuna</th>
                <th scope="col">Rango</th>
                <th scope="col">Fecha de recepcion</th>
            </tr>
        </thead>
        <tbody>
            @forelse($batches as $batch)
            <tr>
                <th scope="row">{{$batch->batch_number}}</th>
                <td>{{$batch->name}}</th>
                <td>{{$batch->since}} - {{$batch->to}}</th>
                <td>{{$batch->reception_date}}</th>
            </tr>
            @empty
                <h1 class="h1"> No hay ningún lote</h1>
            @endforelse
        <tbody>
    </table>
</div>

<script>
    function myFunction(j) {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tbody = table.getElementsByTagName("tbody");
        tr = tbody[0].getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[j];
            if (!td) {
              return 
            }
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
</script>
@endsection

