@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Eliminar</h1>
@stop

@section('content')
<div class="container">
    <h1> Desea eliminar registro? </h1>
    <h2> Codigo: {{ $alumno->idAlumno }} - {{ $alumno->primerNombre }} {{ $alumno->apellidoPaterno}} </h2>
    <form method="POST" action="{{ route('alumno.destroy',$alumno->idAlumno)}}">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger"><i class="fas facheck-square"></i> SI</button>
        <a href="{{ route('cancelarAlumno')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i> NO</button></a>
    </form>
</div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop

