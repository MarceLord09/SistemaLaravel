@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="container">
    <h1>Editar Concepto por Escala</h1>
    <form method="POST" action="{{ route("conceptoEscala.update", $conceptoEscala->idEscalaConcepto)}}">
        @method('put')
        @csrf

        <div class="form-group col-md-4" >
            <label for="">Codigo</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $conceptoEscala->idEscalaConcepto }}"
                disabled>
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

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="idConcepto">Concepto</label>
                <select class="form-control @error('idConcepto') is-invalid @enderror" id="idConcepto"
                    name="idConcepto">
                    @foreach($concepto as $itemconcepto)
                        <option value="{{ $itemconcepto->idConcepto }}">{{ $itemconcepto->tipoConcepto }}</option>
                    @endforeach
                </select>
                @error('idConcepto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>


        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
        <a href="{{ route('cancelarConceptoEscala')}}" class="btn btn-danger"><i class="fas fa-ban"></i>
            Cancelar</button></a>
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