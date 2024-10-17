@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Recibos</h1>
@stop

@section('content')
<div class="container">
    <h1>Editar Recibo</h1>
    <form method="POST" action="{{ route("recibo.update", $recibo->idRecibo)}}">
        @method('put')
        @csrf

        <div class="form-group">
            <label for="">Codigo</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $recibo->idRecibo }}" disabled>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="numeroRecibo">Numero de recibo</label>
                <input class="form-control @error('numeroRecibo') is-invalid @enderror" id="numeroRecibo" name="numeroRecibo" style="text-align:right" >
                @error('numeroRecibo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="descripcion">Descripcion</label>
                <input type="text" class="form-control @error('descripcion') is-invalid @enderror" maxlength="60" id="descripcion" name="descripcion" value="{{ $recibo->descripcion}}">
                @error('descripcion')
                <span class=" invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button> 
        <a href="{{ route('cancelarRecibo')}}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</button></a> 
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
