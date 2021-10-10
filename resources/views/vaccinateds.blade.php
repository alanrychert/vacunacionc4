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
                <th scope="col">DNI</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse($vaccinateds as $vaccinated)
            <tr>
                <th scope="row">{{$vaccinated->dni}}</th>
                <td>{{$vaccinated->name}}</td>
                <td>{{$vaccinated->last_name}}</td>
                <td class="justify-items-end">
                <a class="btn btn-dark" href="{{ route('vaccinated.edit',$vaccinated)}}">Editar</a>
                </td>
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