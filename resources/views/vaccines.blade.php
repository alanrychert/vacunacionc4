@extends('layouts.app')
@section('contenido')
<div class="container-fluid col-8">
    <div class="row">
            <div class="col">
                <input type="text" id="myInput" onkeyup="myFunction(4)" class="form-control" placeholder="Filtrar por provincia">
            </div>
        <br>
        <br>
    </div>
    <table id="myTable" class="table">
        <thead>
            <tr>
                <th scope="col">Número de vacuna</th>
                <th scope="col">Número de lote</th>
                <th scope="col">Fecha de aplicación</th>
                <th scope="col">Dósis</th>
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
      function myFunction(j) {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tbody = table.getElementsByTagName("tbody");
          tr = tbody[0].getElementsByTagName("tr");
          console.log(tr);
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