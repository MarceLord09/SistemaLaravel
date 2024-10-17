@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="container">
    <h2>Eliminar Concepto por Escala ? </h2>
    <br>
    <h4> Dato: {{ $conceptoEscala->escala->tipoEscala }} , {{ $conceptoEscala->concepto->tipoConcepto }} </h4>
    <form method="POST" action="{{ route('conceptoEscala.destroy',$conceptoEscala->idEscalaConcepto)}}">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i> SI</button>
        <a href="{{ route('cancelarConceptoEscala')}}" class="btn btn-primary"><i class="fas fa-times-circle"></i> NO</button></a>
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
