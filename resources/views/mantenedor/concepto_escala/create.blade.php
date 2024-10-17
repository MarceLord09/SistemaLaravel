@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <div class="container">
        <h1>Registrar Concepto  Escala</h1>
        <hr>
        <form method="POST" action="{{ route('conceptoEscala.store')}}">
        @csrf
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

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="idConcepto">Concepto</label>
                    <select name="idConcepto" id="idConcepto" class="form-control">
                        @foreach($concepto as $itemconcepto)
                            <option value="{{ $itemconcepto->idConcepto}}">{{ $itemconcepto->tipoConcepto}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

                <button  type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Grabar</button>
                <a href="{{ route('cancelarConceptoEscala')}} " class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
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


