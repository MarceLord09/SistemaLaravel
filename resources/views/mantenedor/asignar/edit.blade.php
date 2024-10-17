@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="container">
    <h1>Editar Asignacion</h1>
    <form method="POST" action="{{ route("asignar.update", $asignar->idAsignarEscala)}}">
        @method('put')
        @csrf

        <div class="form-group col-md-4">
            <label for="">Codigo</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $asignar->idAsignarEscala }}" disabled>
        </div>

        <div class="form-group col-md-4">
            <label for="">ID Alumno</label>
            <input type="text" class="form-control" id="idAlumno" name="idAlumno" value="{{ $asignar->idAlumno }}" disabled>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="idEscala">Escala</label>
                <select class="form-control @error('idEscala') is-invalid @enderror" id="idEscala"
                    name="idEscala">
                    @foreach($escala as $itemEscala)
                        <option value="{{ $itemEscala->idEscala }}">{{ $itemEscala->tipoEscala }}</option>
                    @endforeach
                </select>
                @error('idEscala')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group col-md-4">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $asignar->fecha}}">
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
            <a href="{{ route('cancelarAsignar')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</button></a> 
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
