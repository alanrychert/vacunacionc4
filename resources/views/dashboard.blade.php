@extends('layouts.app')
@section('contenido')
<div class="container-fluid">
  <div class="row mx-0">
      <div class="card">
      <!--Datos del usuario-->
        <div class="card-body">
          <h5 class="card-title">Nombre: {{$user->name}}</h5>
          <h5 class="card-title">Apellido: {{$user->last_name}}</h5>
          <h5 class="card-title">Usuario: {{$user->user}}</h5>
          <h5 class="card-title">Correo Electronico: {{$user->email}}</h5>
          <h5 class="card-title">Region Sanitaria: {{$user->sanitary_region->name}}</h5>
          <h5 class="card-title">Provincia: {{$user->sanitary_region->province->name}}</h5>
          <h5 class="card-text">Rol: {{$rol}}</h5>
        </div>
    </div>
  </div>
</div>
@endsection
