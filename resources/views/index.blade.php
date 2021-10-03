@extends('layouts.app')
@section('contenido')
<h1>Soy el inicio</h1>
@auth
<li><a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">
    Dashboard
</a></li>
@endauth
@endsection