@extends('layouts.app')
@section('contenido')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }} "> 
        @csrf
            <a href="{{ route('logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" onclick="event.preventDefault();this.closest('form').submit();">Log out</a>
    </div>
@endsection
