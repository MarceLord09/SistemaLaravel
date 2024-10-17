@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="container">
    <h1>Editar Concepto</h1>
    <form method="POST" action="{{ route("concepto.update", $concepto->idConcepto)}}">
        @method('put')
        @csrf

        <div class="form-group col-md-4">
            <label for="">Codigo</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $concepto->idConcepto }}" disabled>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="tipoConcepto">Tipo de Concepto</label>
                <input class="form-control @error('tipoConcepto') is-invalid @enderror" id="tipoConcepto" name="tipoConcepto" style="text-align:right" value="{{ $concepto->tipoConcepto}}">
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
                <input type="text" class="form-control @error('descripcion') is-invalid @enderror" maxlength="60" id="descripcion" style="text-align:right" name="descripcion" value="{{ $concepto->descripcion}}">
                @error('descripcion')
                <span class=" invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button> 
        <a href="{{ route('cancelarConcepto')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</button></a> 
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
