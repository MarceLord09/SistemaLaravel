@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="container">
    <h2>¿Eliminar asignacion? </h2>
    <h4> Tipo: {{$asignar->escala->tipoEscala}} - {{ $asignar->alumno->primerNombre }} , {{ $asignar->alumno->apellidoPaterno }} </h4>
    <form method="POST" action="{{ route('asignar.destroy',$asignar->idAsignarEscala)}}">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i> SI</button>
        <a href="{{ route('cancelarAsignar')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i> NO</button></a>
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
