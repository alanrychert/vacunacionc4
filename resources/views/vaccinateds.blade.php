@extends('layouts.app')
@section('contenido')
<div class="container-fluid col-8">
    <div class="row">
        <div class="col-8">
            <select onchange="get(this.value)" onchange="DeleteRows()" class="form-select" name="selectedFilter">
                <option selected>Seleccionar</option>
                <option value="1">1 dosis por provincia</option>
                <option value="2">1 dosis por región sanitaria</option>
                <option value="3">2 dosis por provincia</option>
                <option value="4">Comorbilidad</option>
                <option value="5">Edad</option>
                <option value="6">Fecha de vacunación</option>
            </select>
        </div>
        <div class="col-8">
            <select onchange="myFunction(9,this.value)" id="province" name="province" class="form-select block appearance-none mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="Buenos Aires">Buenos Aires</option>
                <option value="C.A.B.A">C.A.B.A</option>
                <option value="Catamarca">Catamarca</option>
                <option value="Chaco">Chaco</option>
                <option value="Chubut">Chubut</option>
                <option value="Córdoba">Córdoba</option>
                <option value="Corrientes">Corrientes</option>
                <option value="Entre Ríos">Entre Ríos</option>
                <option value="Formosa">Formosa</option>
                <option value="Jujuy">Jujuy</option>
                <option value="La Pampa">La Pampa</option>
                <option value="La Rioja">La Rioja</option>
                <option value="Mendoza">Mendoza</option>
                <option value="Misiones">Misiones</option>
                <option value="Neuquén">Neuquén</option>
                <option value="Río Negro">Río Negro</option>
                <option value="Salta">Salta</option>
                <option value="San Juan">San Juan</option>
                <option value="San Luis">San Luis</option>
                <option value="Santa Cruz">Santa Cruz</option>
                <option value="Santa Fe">Santa Fe</option>
                <option value="Santiago del Estero">Santiago del Estero</option>
                <option value="Tierra del Fuego">Tierra del Fuego</option>
                <option value="Tucumán">Tucumán</option>
            </select>   
        </div>
        <div class="col-8">
            <select onchange="myFunction(8,this.value)" id="sanitary_region" name="sanitary_region" class="form-select block appearance-none mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
        <div>
            <input type="number" class="form-control" id="age" name="age">
        </div>
        <button id="ageButton" name="ageButton" onclick="getByAge(document.getElementById(age).value)">Buscar</button>
        <div>
            <input type="date" onchange="getByDate(this.value)" class="form-control" id="date_of_vaccination" name="date_of_vaccination">
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
                function hideOne(){
                    document.getElementById('province').style.visibility = 'visible';
                    document.getElementById('sanitary_region').style.visibility = 'hidden';
                    document.getElementById('age').style.visibility = 'hidden';
                    document.getElementById('date_of_vaccination').style.visibility = 'hidden';
                    document.getElementById('ageButton').style.visibility = 'hidden';
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
                function hideTwo(){
                    document.getElementById('province').style.visibility = 'hidden';
                    document.getElementById('sanitary_region').style.visibility = 'visible';
                    document.getElementById('age').style.visibility = 'hidden';
                    document.getElementById('date_of_vaccination').style.visibility = 'hidden';
                    document.getElementById('ageButton').style.visibility = 'hidden';
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
                function hideThree(){
                    document.getElementById('province').style.visibility = 'visible';
                    document.getElementById('sanitary_region').style.visibility = 'hidden';
                    document.getElementById('age').style.visibility = 'hidden';
                    document.getElementById('date_of_vaccination').style.visibility = 'hidden';
                    document.getElementById('ageButton').style.visibility = 'hidden';
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
                function hideFour(){
                    document.getElementById('province').style.visibility = 'hidden';
                    document.getElementById('sanitary_region').style.visibility = 'hidden';
                    document.getElementById('age').style.visibility = 'hidden';
                    document.getElementById('date_of_vaccination').style.visibility = 'hidden';
                    document.getElementById('ageButton').style.visibility = 'hidden';
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
                //aca no se hace nada
                break;
            case '6':
                
                break;
            default:
                break;
        }
    }

    function getByAge(value){
        function hideFive(){
            document.getElementById('province').style.visibility = 'hidden';
            document.getElementById('sanitary_region').style.visibility = 'hidden';
            document.getElementById('age').style.visibility = 'hidden';
            document.getElementById('date_of_vaccination').style.visibility = 'hidden';
        }
        $.ajax({
        url:"{{ route('vaccinated.byAge') }}",
        method: "GET",
        data: {age: value},
        success: 
            function(data){
                parseResultToTable(data);
                hideFive()
            }
        })
    }

    function getByDate(value){
        function hideSix(){
            document.getElementById('province').style.visibility = 'hidden';
            document.getElementById('sanitary_region').style.visibility = 'hidden';
            document.getElementById('age').style.visibility = 'hidden';
            document.getElementById('date_of_vaccination').style.visibility = 'hidden';
            document.getElementById('ageButton').style.visibility = 'hidden';
        }
        $.ajax({
        url:"{{ route('vaccinated.byDate') }}",
        method: "GET",
        data: {date: value},
        success: 
            function(data){
                parseResultToTable(data);
                hideSix()
            }
        })
    }

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

    //Hacer función que haga append de todo el resultado
    function parseResultToTable(results){
        const myTable = $("#myTable");
        results.forEach(result => {
            console.log('agregando');
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

    function DeleteRows() {
        var rowCount = myTable.rows.length;
        for (var i = rowCount - 1; i > 0; i--) {
            myTable.deleteRow(i);
        }
    }
  </script>