@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <div class="container">
        <h1>Registrar Concepto</h1>
        <hr>
        <form method="POST" action="{{ route('concepto.store')}}">
            @csrf

            <div class="form-row">
            <div class="form-group col-md-4">
                <label for="tipoConcepto">Concepto</label>
                <input class="form-control @error('tipoConcepto') is-invalid @enderror" id="tipoConcepto" name="tipoConcepto" >
                @error('tipoConcepto')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" class="form-control @error('descripcion') is-invalid @enderror" maxlength="60" id="descripcion" name="descripcion">
                    @error('descripcion')
                    <span class=" invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <button  type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Grabar</button>
            <a href="{{ route('cancelarConcepto')}} " class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
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


