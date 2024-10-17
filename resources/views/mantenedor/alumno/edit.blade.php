@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Usuarios</h1>
@stop

@section('content')
<div class="container">
    <h1>Editar registro</h1>
    <form method="POST" action="{{ route("alumno.update", $alumno->idAlumno)}}">
        @method('put')
        @csrf

        <div class="form-group">
            <label for="idAlumno">Codigo</label>
            <input type="text" class="form-control" id="idAlumno" name="idAlumno" value="{{ $alumno->idAlumno }}" disabled>
        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="primerNombre">Primer Nombre</label>
                <input type="text" class="form-control @error('primerNombre') is-invalid @enderror" maxlength="10" id="primerNombre" name="primerNombre" value="{{ $alumno->primerNombre}}">
                @error('primerNombre')
                <span class=" invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="otrosNombres">Otros Nombre</label>
                <input type="text" class="form-control @error('otrosNombres') is-invalid @enderror" maxlength="30" id="otrosNombres" name="otrosNombres" value="{{ $alumno->otrosNombres}}">
                @error('otrosNombres')
                <span class=" invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="apellidoPaterno">Apellido Paterno</label>
                <input type="text" class="form-control @error('apellidoPaterno') is-invalid @enderror" maxlength="15" id="apellidoPaterno" name="apellidoPaterno" value = "{{$alumno->apellidoPaterno}}">
                @error('ApellidoPaterno')
                <span class=" invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="apellidoMaterno">Apellido Materno</label>
                <input type="text" class="form-control @error('apellidoMaterno') is-invalid @enderror" maxlength="15" id="apellidoMaterno" name="apellidoMaterno" value="{{ $alumno->apellidoMaterno}}">
                @error('apellidoMaterno')
                <span class=" invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="anio">Año</label>
                <input type="text" class="form-control @error('anio') is-invalid @enderror" maxlength="30" id="anio" name="anio" value = "{{$alumno->anio}}">
                @error('anio')
                <span class=" invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="seccion">Seccion</label>
                <input type="text" class="form-control @error('seccion') is-invalid @enderror" maxlength="1" id="seccion" name="seccion" value="{{ $alumno -> seccion }}">
                @error('seccion')
                <span class=" invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="periodo">Periodo</label>
                <input type="text" class="form-control @error('periodo') is-invalid @enderror" maxlength="10" id="periodo" name="periodo" value = "{{ $alumno-> periodo}} ">
                @error('periodo')
                <span class=" invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button> 
        <a href="{{ route('cancelarAlumno')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</button></a> 
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
