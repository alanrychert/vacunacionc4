@extends('layouts.app')
@section('contenido')
<div class="container-fluid col-8">
    <div class="row">
            <div class="col">
                <input type="text" id="myInput" onkeyup="myFunction(1)" class="form-control" placeholder="Filtrar por nombre">
            </div>
            <div class="col-8">
                <select onchange="get(this.value)" class="form-select" name="selectedFilter">
                    <option selected value="1">1 dosis por provincia</option>
                    <option value="2">1 dosis por región sanitaria</option>
                    <option value="3">2 dosis por provincia</option>
                    <option value="4">Comorbilidad</option>
                    <option value="5">Edad</option>
                    <option value="6">Fecha de vacunación</option>
                </select>
            </div>
        <br>
        <br>
    </div>
    <div class="table-responsive">
        <table id="myTable" class="table content-table">
            <thead>
                <tr>
                    <th scope="col">DNI</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Comorbilidad</th>
                    <th scope="col">Dosis</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">Fecha de vacunación</th>
                    <th scope="col">Region sanitaria</th>
                    <th scope="col">Provincia</th>
                </tr>
            </thead>
            <tbody>
                
            <tbody>
        </table>
    </div>
</div>
@endsection

<script>
    const FIRSTDOSE=1;
    const SECONDDOSE=2;
    function get(value){
        console.log(value);
        switch (value) {
            case '1': //filtra por primera dosis y provincia
                const myTable = $("#myTable");
                console.log("entré");
                $.ajax({
                url:"{{ route('vaccinated.byDose') }}",
                method: "GET",
                data:{ dose:FIRSTDOSE},
                success: 
                    function(data){
                        data.forEach(result => {
                            const myRow = $("<tr>");
                            const dniTD = $("<td>");
                            dniTD.text(result.dni);
                            const sexTD = $("<td>");
                            sexTD.text(result.sex);
                            const nameTD = $("<td>");
                            nameTD.text(result.name);
                            const last_nameTD = $("<td>");
                            last_nameTD.text(result.last_name);
                            const comorbidityTD = $("<td>");
                            comorbidityTD.text(result.comorbidity);
                            const doseTD = $("<td>");
                            doseTD.text(result.dose);
                            const date_of_birthTD = $("<td>");
                            date_of_birthTD.text(result.date_of_birth);
                            const date_of_vaccinationTD = $("<td>");
                            date_of_vaccinationTD.text(result.date_of_vaccination);
                            const regionTD = $("<td>");
                            regionTD.text(result.region);
                            const provinceTD = $("<td>");
                            provinceTD.text(result.province);
                            myRow.append(dniTD);
                            myRow.append(sexTD);
                            myRow.append(nameTD);
                            myRow.append(last_nameTD);
                            myRow.append(comorbidityTD);
                            myRow.append(doseTD);
                            myRow.append(date_of_birthTD);
                            myRow.append(date_of_vaccinationTD);
                            myRow.append(regionTD);
                            myRow.append(provinceTD);
                            myTable.append(myRow);
                        })
                    }
        })
                break;
            case 2:
                
                break;
            case 3:
                
                break;
            case 4:
                
                break;
            case 5:
                
                break;
            case 6:
                
                break;
            default:
                break;
        }
    }

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

    //Hacer función que haga append de todo el resultado
  </script>