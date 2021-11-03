@extends('layouts.app')
@section('contenido')
<div class="container-fluid col-8">
    <div class="row">
        <div class="col-8">
            <label class='font-weight-bold'>Seleccione el filtro</label>
            <select onchange=" get(this.value)" class="form-select" name="selectedFilter">
                <option value="0" selected>Seleccionar todos</option>
                <option value="1">1 dosis por provincia</option>
                <option value="2">1 dosis por región sanitaria</option>
                <option value="3">2 dosis por provincia</option>
                <option value="4">Comorbilidad</option>
                <option value="5">Edad</option>
                <option value="6">Fecha de vacunación</option>
                <option value="7">Por genero</option>
            </select>
        </div>
        <div class="col-8">
            <select onchange="myFunction(9,this.value)" id="province" name="province" style="visibility:hidden" class="form-select block appearance-none mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option selected>Seleccionar provincia</option>
                @foreach($provinces as $province)
                <option value="{{$province->name}}">{{$province->name}}</option>
                @endforeach
            </select>   
        </div>
        <div class="col-8">
            <select onchange="myFunction2(1,this.value)" id="sex" name="sex" style="visibility:hidden" class="form-select block appearance-none mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value=" " selected>Seleccionar sexo</option>
                <option value="F">Femenino</option>
                <option value="M">Masculino</option>
                <option value="X">No binario</option>
            </select>   
        </div>
        <div class="col-8">
            <select onchange="myFunction(8,this.value)" id="sanitary_region" name="sanitary_region" style="visibility:hidden" class="form-select block appearance-none mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option selected>Seleccionar region sanitaria</option>
                @foreach($regions as $region)
                <option value="{{$region->name}}">{{$region->name}}</option>
                @endforeach
            </select>   
        </div>
        <div>
            <input type="number" class="form-control" id="age" style="visibility:hidden" name="age">
        </div>
        <button id="ageButton" name="ageButton" style="visibility:hidden" onclick="getByAge(document.getElementById('age').value)">Buscar</button>
        <div>
            <input type="date" onchange="getByDate(this.value)" style="visibility:hidden" class="form-control mb-3" id="date_of_vaccination" name="date_of_vaccination">
        </div>
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
                @foreach($vaccinateds as $vaccinated)
                <tr>
                    <td>
                        <a class="btn btn-dark" href="{{ route('vaccinated.edit',['dni' => $vaccinated->dni]) }}">Editar</a>
                    </td>
                    <td>{{$vaccinated->dni}}</td>
                    <td>{{$vaccinated->sex}}</td>
                    <td>{{$vaccinated->name}}</td>
                    <td>{{$vaccinated->last_name}}</td>
                    <td>{{$vaccinated->comorbidity}}</td>
                    <td>{{$vaccinated->dose}}</td>
                    <td>{{$vaccinated->date_of_birth}}</td>
                    <td>{{$vaccinated->date_of_vaccination}}</td>
                    <td>{{$vaccinated->region}}</td>
                    <td>{{$vaccinated->province}}</td>
                </tr>       
                @endforeach
            <tbody>
        </table>
    </div>
</div>


<script>
    const FIRSTDOSE=1;
    const SECONDDOSE=2;
    function get(value){
        switch (value) {
            case '0': //esconde todos los inputs
                DeleteRows();
                function hideZero(){
                    document.getElementById('province').style.visibility = 'hidden';
                    document.getElementById('sanitary_region').style.visibility = 'hidden';
                    document.getElementById('age').style.visibility = 'hidden';
                    document.getElementById('date_of_vaccination').style.visibility = 'hidden';
                    document.getElementById('ageButton').style.visibility = 'hidden';
                    document.getElementById('sex').style.visibility = 'hidden';
                }
                $.ajax({
                url:"{{ route('vaccinated.all') }}",
                method: "GET",
                data: {},
                success: 
                    function(data){
                        parseResultToTable(data);
                        hideZero()
                    }
                })
                
                break;
            case '1': //filtra por primera dosis y provincia
                DeleteRows();
                function hideOne(){
                    document.getElementById('province').style.visibility = 'visible';
                    document.getElementById('sanitary_region').style.visibility = 'hidden';
                    document.getElementById('age').style.visibility = 'hidden';
                    document.getElementById('date_of_vaccination').style.visibility = 'hidden';
                    document.getElementById('ageButton').style.visibility = 'hidden';
                    document.getElementById('sex').style.visibility = 'hidden';
                }
                $.ajax({
                url:"{{ route('vaccinated.byDose') }}",
                method: "GET",
                data: {dose:FIRSTDOSE},
                success: 
                    function(data){
                        parseResultToTable(data);
                        hideOne()
                    }
                })
                break;
            case '2':
                DeleteRows();
                function hideTwo(){
                    document.getElementById('province').style.visibility = 'hidden';
                    document.getElementById('sanitary_region').style.visibility = 'visible';
                    document.getElementById('age').style.visibility = 'hidden';
                    document.getElementById('date_of_vaccination').style.visibility = 'hidden';
                    document.getElementById('ageButton').style.visibility = 'hidden';
                    document.getElementById('sex').style.visibility = 'hidden';
                }
                $.ajax({
                url:"{{ route('vaccinated.byDose') }}",
                method: "GET",
                data: {dose:FIRSTDOSE},
                success: 
                    function(data){
                        parseResultToTable(data);
                        hideTwo()
                    }
                })
                break;
            case '3':
                DeleteRows();
                function hideThree(){
                    document.getElementById('province').style.visibility = 'visible';
                    document.getElementById('sanitary_region').style.visibility = 'hidden';
                    document.getElementById('age').style.visibility = 'hidden';
                    document.getElementById('date_of_vaccination').style.visibility = 'hidden';
                    document.getElementById('ageButton').style.visibility = 'hidden';
                    document.getElementById('sex').style.visibility = 'hidden';
                }
                $.ajax({
                url:"{{ route('vaccinated.byDose') }}",
                method: "GET",
                data: {dose:SECONDDOSE},
                success: 
                    function(data){
                        parseResultToTable(data);
                        hideThree()
                    }
                })
                break;
            case '4':
                DeleteRows();
                function hideFour(){
                    document.getElementById('province').style.visibility = 'hidden';
                    document.getElementById('sanitary_region').style.visibility = 'hidden';
                    document.getElementById('age').style.visibility = 'hidden';
                    document.getElementById('date_of_vaccination').style.visibility = 'hidden';
                    document.getElementById('ageButton').style.visibility = 'hidden';
                    document.getElementById('sex').style.visibility = 'hidden';
                }
                $.ajax({
                url:"{{ route('vaccinated.withComorbidity') }}",
                method: "GET",
                data: {},
                success: 
                    function(data){
                        parseResultToTable(data);
                        hideFour()
                    }
                })
                break;
            case '5':
                function hideFive(){
                    document.getElementById('province').style.visibility = 'hidden';
                    document.getElementById('sanitary_region').style.visibility = 'hidden';
                    document.getElementById('age').style.visibility = 'visible';
                    document.getElementById('date_of_vaccination').style.visibility = 'hidden';
                    document.getElementById('ageButton').style.visibility = 'visible';
                    document.getElementById('sex').style.visibility = 'hidden';
                }
                hideFive()
                break;
            case '6':
                function hideSix(){
                    document.getElementById('province').style.visibility = 'hidden';
                    document.getElementById('sanitary_region').style.visibility = 'hidden';
                    document.getElementById('age').style.visibility = 'hidden';
                    document.getElementById('date_of_vaccination').style.visibility = 'visible';
                    document.getElementById('ageButton').style.visibility = 'hidden';
                    document.getElementById('sex').style.visibility = 'hidden';
                }
                hideSix()
                break;
            case '7':
                function hideSeven(){
                    document.getElementById('province').style.visibility = 'hidden';
                    document.getElementById('sanitary_region').style.visibility = 'hidden';
                    document.getElementById('age').style.visibility = 'hidden';
                    document.getElementById('date_of_vaccination').style.visibility = 'hidden';
                    document.getElementById('ageButton').style.visibility = 'hidden';
                    document.getElementById('sex').style.visibility = 'visible';
                    
                }
                hideSeven()
                break;
            default:
                break;
        }
    }

    function getByAge(value){
        DeleteRows();
        
        $.ajax({
        url:"{{ route('vaccinated.byAge') }}",
        method: "GET",
        data: {age: value},
        success: 
            function(data){
                parseResultToTable(data);
            }
        })
    }

    function getByDate(value){
        DeleteRows();
        console.log(value);
        $.ajax({
        url:"{{ route('vaccinated.byDate') }}",
        method: "GET",
        data: {date_of_vaccination: value},
        success: 
            function(data){
                parseResultToTable(data);
            }
        })
    }

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

    //Hacer función que haga append de todo el resultado
    function parseResultToTable(results){
        const myTable = $("#myTable");
        results.forEach(result => {
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

    function myFunction2(j, value) {
          var filter, table, tr, td, i, txtValue;
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
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  tr[i].style.display = "";
              } else {
                  tr[i].style.display = "none";
              }
          }
      }

    function DeleteRows() {
        var rowCount = myTable.rows.length;
        for (var i = rowCount - 1; i > 0; i--) {
            myTable.deleteRow(i);
        }
    }
  </script>


  @endsection