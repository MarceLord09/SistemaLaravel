@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Registro de Recibo</h1>
@stop

@section('content')
    <div class="container">
        <h1>Registrar Nuevo Recibo</h1>
        <hr>
        <form method="POST" action="{{ route('recibo.store') }}">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="idRecibo">ID de Recibo</label>
                    <input class="form-control @error('idRecibo') is-invalid @enderror" id="idRecibo" name="idRecibo">
                    @error('idRecibo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="fecha">Fecha</label>
                    <input type="date" class="form-control @error('fecha') is-invalid @enderror" id="fecha" name="fecha">
                    @error('fecha')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="concepto">Concepto</label>
                    <input type="text" class="form-control @error('concepto') is-invalid @enderror" maxlength="60" id="concepto" name="concepto">
                    @error('concepto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="monto">Monto</label>
                    <input type="number" step="0.01" class="form-control @error('monto') is-invalid @enderror" id="monto" name="monto">
                    @error('monto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            </div>

            <button type="submit" class="btn btn-primary mr-5"><i class="fas fa-save"></i> Grabar</button>
            <a href="{{ route('cancelarRecibo') }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
        </form>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
