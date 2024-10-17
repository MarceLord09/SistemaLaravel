@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Registro Alumno</h1>
@stop

@section('content')
<div class="container">
    <h1>Crear Registro</h1>
    <hr>
    <form method="POST" action="{{ route('alumno.store')}}">
        @csrf


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="primerNombre">Primer Nombre</label>
                <input type="text" class="form-control @error('primerNombre') is-invalid @enderror" maxlength="10"
                    id="primerNombre" name="primerNombre">
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
                <input type="text" class="form-control @error('otrosNombres') is-invalid @enderror" maxlength="30"
                    id="otrosNombres" name="otrosNombres">
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
                <input type="text" class="form-control @error('apellidoPaterno') is-invalid @enderror" maxlength="15"
                    id="apellidoPaterno" name="apellidoPaterno">
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
                <input type="text" class="form-control @error('apellidoMaterno') is-invalid @enderror" maxlength="15"
                    id="apellidoMaterno" name="apellidoMaterno">
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
                <select class="form-control @error('anio') is-invalid @enderror" id="anio" name="anio">
                <option value="">Seleccione un año</option>
                    <option value="1RO">1ERO de Secundaria</option>
                    <option value="2DO">2DO de Secundaria</option>
                    <option value="3RO">3RO de Secundaria</option>
                    <option value="4TO">4TO de Secundaria</option>
                    <option value="5TO">5TO de Secundaria</option>
                </select>
                @error('anio')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="seccion">Seccion</label>
                <select class="form-control @error('seccion') is-invalid @enderror" id="seccion" name="seccion">
                    <option value="">Seleccione una seccion</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
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
                <input type="text" class="form-control @error('periodo') is-invalid @enderror" maxlength="10"
                    id="periodo" name="periodo">
                @error('periodo')
                    <span class=" invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Grabar</button>
        <a href="{{ route('cancelarAlumno')}} " class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
    </form>
</div>

@stop

@section('css')
{{-- Add here extra stylesheets --}}
{{--
<link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop