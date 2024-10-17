@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Usuarios</h1>
@stop

@section('content')
<div class="container">
    <h1>Editar Escala</h1>
    <form method="POST" action="{{ route("escalas.update", $escala->idEscala)}}">
        @method('put')
        @csrf

        <div class="form-group">
            <label for="">Codigo</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $escala->idEscala }}" disabled>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="tipoEscala">Tipo de Escala</label>
                <input class="form-control @error('tipoEscala') is-invalid @enderror" id="tipoEscala" name="tipoEscala" style="text-align:right" >
                @error('tipoEscala')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="descripcion">Descripcion</label>
                <input type="text" class="form-control @error('descripcion') is-invalid @enderror" maxlength="60" id="descripcion" name="descripcion" value="{{ $escala->descripcion}}">
                @error('descripcion')
                <span class=" invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button> 
        <a href="{{ route('cancelarEscala')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</button></a> 
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
