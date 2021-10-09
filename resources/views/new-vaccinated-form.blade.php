     <div class="row mb-3 justify-content-center">
        <div class="col-2">
            <label class="form-label font-weight-bold" for="name">Nombre</label>
        </div>
        <div class="col-8">
            <input type="text" class="form-control" value="{{old('name')}}" id="name" name="name" required>
            @error('Nombre')<small>*{{$message}}</small>@enderror
        </div>
    </div>
    <div class="row mb-3 justify-content-center">
        <div class="col-2">
            <label class="form-label font-weight-bold" for="last_name">Apellido</label>
        </div>
        <div class="col-8">
            <input type="text" class="form-control" value="{{old('last_name')}}" id="last_name" name="last_name" required>
            @error('Apellido')<small>*{{$message}}</small>@enderror
        </div>
    </div>
    <div class="row mb-3 justify-content-center">
        <div class="col-2">
            <label class="form-label font-weight-bold" for="date_of_birth">Fecha de nac</label>
        </div>
        <div class="col-8">
            <input type="date" class="form-control" id="date_of_birth" dateFormat="dd-MM-yyyy" placeholder="dd/mm/aaaa" name="date_of_birth" required>
            @error('Fecha de nac')<small>*{{$message}}</small>@enderror
        </div>
    </div>
    <div class="row mb-3 justify-content-center">
        <div class="col-2">
            <label class="form-label font-weight-bold" for="dni">DNI</label>
        </div>
        <div class="col-8">
            <input readonly type="number" class="form-control" value="{{$dni}}" id="dni" name="dni" required>
            @error('DNI')<small>*{{$message}}</small>@enderror
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-2">
            <label class="form-label font-weight-bold" >Comorbilidad</label>
        </div>
        <div class="col-8" style="display:inline-flex">
            <div class="form-check ">
                <input 
                onclick="document.getElementById('comorbidity').disabled = false;"
                class="form-check-input" type="radio" name="option" id="Si" value="Si">
                <label class="form-check-label pr-3" for="si">Si</label>
            </div>
            <div class="form-check">
                <input 
                onclick="document.getElementById('comorbidity').disabled = true; document.getElementById('comorbidity').value = ''"
                class="form-check-input" type="radio" name="option" id="No" value="No" checked>
                <label class="form-check-label" for="No">No</label>
            </div>
        </div>
    </div>
    <div class="row mb-3 justify-content-center">
        <div class="col-2">
            <label class="form-label font-weight-bold" for="comorbidity">Descripción</label>
        </div>
        <div class="col-8">
            <input type="text" class="form-control" value="{{old('comorbidity')}}" placeholder="" id="comorbidity" name="comorbidity" disabled="disabled">
        </div>
        @error('Descripcion')<small>*{{$message}}</small>@enderror
    </div>
    <div class="row mb-3 justify-content-center">
        <div class="col-2">
            <label class="form-label font-weight-bold" for="sex">Sexo</label>
        </div>
        <div class="col-8">
            <select class="form-select" name="sex">
                <option selected>Seleccionar</option>
                <option value="F">Femenino</option>
                <option value="M">Masculino</option>
            </select>
            @error('Sexo')<small>*{{$message}}</small>@enderror
        </div>
    </div>