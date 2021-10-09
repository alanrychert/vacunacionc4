@extends('layouts.app')
@section('contenido')
@if(session('info'))
    <div class="row">
      <div class="alert alert-success">
          <strong>{{session('info')}}</strong>
      </div>
    </div>
  @endif
    <body class="antialiased">
        <div class="relative items-top">
            <div class="row">
            </div>
        </div>
    </body>
</html>
@endsection
