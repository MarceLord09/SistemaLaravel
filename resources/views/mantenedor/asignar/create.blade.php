@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <div class="container">
        <h1>Registrar Nueva Asignacion</h1>
        <hr>
        <form method="POST" action="{{ route('asignar.store')}}">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="idAlumno">ID Alumno</label>
                    <select name="idAlumno" id="idAlumno" class="form-control">
                        @foreach($alumno as $itemalumno)
                            <option value="{{ $itemalumno->idAlumno}}">{{ $itemalumno->idAlumno}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="idEscala">Escala</label>
                    <select name="idEscala" id="idEscala" class="form-control">
                        @foreach($escala as $itemescala)
                            <option value="{{ $itemescala->idEscala}}">{{ $itemescala->tipoEscala}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control">
            </div>

            <button  type="submit" class="btn btn-primary mr-5"><i class="fas fa-save"></i>Grabar</button>
            <a href="{{ route('cancelarAsignar')}} " class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
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


