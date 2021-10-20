@extends('layouts.app')
@section('contenido')
<div class="container-fluid col-8">
    <div class="row">
        <div class="col-3">
            <label class="form-label font-weight-bold" for="dni">Seleccione la region sanitaria</label>
        </div>
        <div class="col-8">
            <select onchange="myFunction(3,this.value)" id ="sanitary_region" name="sanitary_region" class="form-select block appearance-none mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="Region Sanitaria I">Region Sanitaria I</option>
                <option value="Region Sanitaria II">Region Sanitaria II</option>
                <option value="Region Sanitaria III">Region Sanitaria III</option>
                <option value="Region Sanitaria IV">Region Sanitaria IV</option>
                <option value="Region Sanitaria V">Region Sanitaria V</option>
                <option value="Region Sanitaria VI">Region Sanitaria VI</option>
                <option value="Region Sanitaria VII">Region Sanitaria VII</option>
                <option value="Region Sanitaria VIII">Region Sanitaria VIII</option>
                <option value="Region Sanitaria IX">Region Sanitaria IX</option>
                <option value="Region Sanitaria X">Region Sanitaria X</option>
                <option value="Region Sanitaria XI">Region Sanitaria XI</option>
                <option value="Region Sanitaria XII">Region Sanitaria XII</option>
            </select>   
        </div>
    </div>
    </div>
    <table id="myTable" class="table">
        <thead>
            <tr>
                <th scope="col">DNI</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Region Sanitaria</th>
                <th scope="col">Provincia</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse($admins as $admin)
            <tr>
                <td scope="row">{{$admin->dni}}</td>
                <td>{{$admin->name}}</td>
                <td>{{$admin->last_name}}</td>
                <td>{{$admin->region}}</td>
                <td>{{$admin->province}}</td>
            </tr>
            @empty
                <h1 class="h1"> No hay ningún administrador</h1>
            @endforelse
        <tbody>
    </table>
</div>

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
  @endsection
