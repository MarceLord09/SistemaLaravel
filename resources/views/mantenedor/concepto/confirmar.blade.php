@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Conceptos</h1>
@stop

@section('content')
<div class="container">
    <h1>Eliminar concepto? </h1>
    <h3> Tipo: {{ $concepto->idConcepto }} , {{ $concepto->descripcion }} </h3>
    <form method="POST" action="{{ route('concepto.destroy',$concepto->idConcepto)}}">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger"><i class="fas facheck-square"></i> SI</button>
        <a href="{{ route('cancelarConcepto')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i> NO</button></a>
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
