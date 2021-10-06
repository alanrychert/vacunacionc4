@extends('layouts.app')
@section('contenido')
    <ul class="list-group">
        @forelse($vaccinateds as $vaccinated)
        <li class="list-group-item ">
            <div class="d-flex p-2 flex-grow-1 bd-highlight align-items-center">
            <div class="col" style="font-size:x-large">
                {{$vaccinated->name}}
            </div>
            <div class="col" style="font-size:x-large">
                {{$vaccinated->dni}}
            </div>
                <div class= "col">
                    <a class="btn btn-dark" href="{{ route('vaccinated.edit',$vaccinated->dni) }}">Editar</a>
                </div>
            </div>
            </div>
        </li>
        @empty
        <h1 class="h1"> No hay ningún vacunado</h1>
        @endforelse
    </ul>
@endsection